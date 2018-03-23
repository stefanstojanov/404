<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Message;
use App\Chat;

class MessageController extends Controller
{
    public function create($id){
        $user=User::find($id);
        return view('messages.create',compact('user'));
    }

    public function store(){
        $this->validate(request(),[
            'title'=>'required',
            'text'=>'required',
            'to_user'=>'required'
        ]);

        $user=auth()->user()->id;
        $message=new Message;
        $message->title=request('title');
        $message->to_user=request('to_user');
        $message->user_id=$user;
        $message->save();

        $chat=new Chat;
        $chat->text=request('text');
        $chat->user_id=$user;
        $chat->message_id=$message->id;
        $chat->save();
    }
}
