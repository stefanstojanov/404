<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Message;
use App\Chat;
use DB;
use Carbon\Carbon;

class MessageController extends Controller
{
    public function __construct(){
    }

    public function create($id){
        $user=User::find($id);
        $count=Message::where('to_user','=',$user->id)->where('opened','=',NULL)->count();
        return view('messages.create',compact('user','count'));
    }

    public function store(){
        $this->validate(request(),[
            'title'=>'required',
            'text'=>'required',
            'to_user'=>'required'
        ]);

        $user=auth()->user()->id;
        $message=new Message;
        $message->title=encrypt(request('title'));
        $message->to_user=request('to_user');
        $message->user_id=$user;
        $message->save();

        $chat=new Chat;
        $chat->text=encrypt(request('text'));
        $chat->user_id=$user;
        $chat->message_id=$message->id;
        $chat->save();
    }


    public function show($id)
    {
        $message=Message::where('id','=',$id)->first();
        $user=auth()->user();

        if($user->id==$message->to_user || $user->id==$message->user_id)
        {
            $chats=DB::table('messages')
                ->join('chats','messages.id','=','chats.message_id')
                ->join('users','chats.user_id','=','users.id')
                ->select('messages.*','users.first_name','chats.text','chats.created_at as chats_date')
                ->where('chats.message_id','=',$id)
                ->get();

            foreach($chats as $chat)
            {
                $chat->chats_date=Carbon::parse($chat->chats_date)->diffForHumans();
                $chat->text=decrpyt($chat->text);
            }


            if($message->to_user==$user->id)
            {
                Message::where('id','=',$id)->update(['opened'=>'opened']);
            }
            $message->title=decrypt($message->title);
            $count=Message::where('to_user','=',$user->id)->where('opened','=',NULL)->count();

            return view('messages.show',compact('chats','message','count','image'));
        }

        else return back();
    }

    public function index()
    {
        $user=auth()->user()->id;

        $messages=DB::table('messages')
            ->join('users','messages.user_id','=','users.id')
            ->select('messages.*','users.first_name AS sender')
            ->where('messages.to_user','=',$user)
            ->orderBy('messages.opened','asc')
            ->orderBy('messages.created_at','desc')
            ->get();

        $count=Message::where('to_user','=',$user)->where('opened','=',NULL)->count();
        foreach($messages as $message)
        {
            $message->created_at=Carbon::parse($message->created_at)->diffForHumans();
            $message->title=decrypt($message->title);
        }

        return view('messages.index',compact('messages','count','from'));

    }

    public function sent()
    {
        $user=auth()->user()->id;

        $messages=DB::table('messages')
            ->join('users','messages.to_user','=','users.id')
            ->select('messages.*','users.first_name AS receiver')
            ->where('messages.user_id','=',$user)
            ->get();

        $count=Message::where('to_user','=',$user)->where('opened','=',NULL)->count();
        foreach($messages as $message)
        {
            $message->created_at=Carbon::parse($message->created_at)->diffForHumans();
            $message->title=decrypt($message->title);
        }

        return view('messages.sent',compact('messages','count','counter'));
    }
}
