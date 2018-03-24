<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Chat;
use App\Message;
use App\User;

class ChatController extends Controller
{
    public function store()
    {

        $this->validate(request(),[
            'text'=>'required',
            'user_id'=>'required',
            'message_id'=>'required'
        ]);

        $chat=new Chat;
        $chat->user_id=request('user_id');
        $chat->text=encrypt(request('text'));
        $chat->message_id=request('message_id');
        $chat->save();

        $message_id=request('message_id');

        Message::where('id','=',$message_id)->update(['opened'=>'0']);

        return redirect('/message/'.$message_id);
    }
}
