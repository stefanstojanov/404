<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\RezultatiMail;
use App\User;

class mailController extends Controller
{
    public function rezultati($id){
        $toUser=User::where('id','=',$id)->first();
        \Mail::to($toUser)->send(new RezultatiMail($toUser));
        return redirect('/pratisms');
    }
}
