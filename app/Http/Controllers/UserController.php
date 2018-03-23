<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Institution;
use App\Address;
use App\Result;

class UserController extends Controller
{
    public function index($user){
        $user=User::find($user);
        $pendings=User::where('approved','=','1')->get();
        $results = Result::all();

        return view('profile.index',compact('user','pendings','results'));

    }

    public function check(){
        /*if(auth()->user()->approved==='2')
            return redirect('/');
        else
        {
            auth()->logout();
            Request::session()->flash('error', 'Some error message');
            return redirect()->back();
        }*/
        return redirect('/');
    }
    public function vnesi_pacient(){
        
        $institutions=Institution::all();
        return view('Maticen.vnesi_pacient',compact('institutions'));
    }
    
    public function vnesuvanje_na_pacient(Request $request){
        $this->validate(request(),[
             'име' => 'required',
             'презиме' => 'required',
             'Имејл' => 'required',
             'лозинка' => 'required|string|min:6|confirmed',
             'Мобилен' => 'required',
             'Улица' => 'required',
             'Град' => 'required',
             'Пол' => 'required',
             'Дата' => 'required'
        ]);

        Address::create(['city'=>request('Град'),'street'=>request('Улица')]);
        $address_id=Address::getLast();
        $institution=request('институција');
        if(request('new_inst_confirm')==="new")
        {
            Address::create(['street'=>request('inst_address'),'city'=>request('inst_city')]);
            $address_inst_id=Address::getLast();

            Institution::create(['name'=>request('inst_name'),'address_id'=>$address_inst_id,]);
            $institution=Institution::getLast();
        }
        
        
        $post=User::create([
            'first_name' => request('име'),
             'last_name' => request('презиме'),
             'email' => request('Имејл'),
             'password' => bcrypt(request('лозинка')),
             'mobile' => request('Мобилен'),
             'street' => request('Улица'),
             'city' => request('Град'),
             'gender' => request('Пол'),
             'date_born' => request('Дата'),
            'institution_id'=>$institution,
            'address_id'=>$address_id,
            'type'=>'пациент'
        ]);
        
    }
    
    

}
