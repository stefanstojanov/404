<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AdministratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('administrator');
    }

    public function approve($id){
        User::where('id','=',$id)->update(['approved'=>'2']);
        return redirect('/');
    }

    public function decline($id){
        User::where('id','=',$id)->update(['approved'=>'0']);
        return redirect('/');
    }
}
