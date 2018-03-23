<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($user){
        $user=User::find($user);
        $pendings=User::where('approved','=','1')->get();
        return view('profile.index',compact('user','pendings'));
    }

    public function check(){
        if(auth()->user()->approved==='2')
            return redirect('/');
        else
        {
            auth()->logout();
            Request::session()->flash('error', 'Some error message');
            return redirect()->back();
        }
    }

}
