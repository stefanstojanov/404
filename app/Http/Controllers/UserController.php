<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Institution;
use App\Address;
use App\Result;
use App\Item;
use DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('Maticen',['only'=>['vnesi_pacient','vnesuvanje_na_pacient','edit','update']]);
    }

    public function index($user){
        $user=User::find($user);
        $pendings=User::where('approved','=','1')->get();
        $results = Result::all();
        $items=Item::all();
        $pacienti='';
        if($user->isMaticen())
            $pacienti=DB::table('users')
                        ->join('ima_maticen','users.id','=','ima_maticen.pacient_id')
                        ->where('ima_maticen.maticen_id','=',$user->id)
                        ->select('users.first_name as name','users.id as id')
                        ->get();

        return view('profile.index',compact('user','pendings','results','items','pacienti','institution'));

    }

    public function check(){
        if(auth()->user()->approved==='2')
            return redirect('/');
        else
        {
            auth()->logout();
            $error='errorce';
            return view('welcome',compact('error'));
        }
    }

    public function vnesi_pacient(){
        
        $institutions=Institution::all();
        return view('profile.vnesi_pacient',compact('institutions'));
    }
    
    public function vnesuvanje_na_pacient(Request $request){


        Address::create(['city'=>request('city'),'street'=>request('street')]);
        $address_id=Address::getLast();
        $institution=request('institution');
        if(request('new_inst_confirm')==="new")
        {
            Address::create(['street'=>request('inst_address'),'city'=>request('inst_city')]);
            $address_inst_id=Address::getLast();

            Institution::create(['name'=>request('inst_name'),'address_id'=>$address_inst_id,]);
            $institution=Institution::getLast();
        }

        
        $user=User::create([
            'first_name' => request('име'),
             'last_name' => request('last_name'),
             'email' => request('email'),
             'password' => bcrypt(request('password')),
             'mobile' => request('mobile'),
             'street' => request('street'),
             'city' => request('city'),
             'gender' => request('gender'),
             'date_born' => request('date_born'),
            'EMBG'=>request('EMBG'),
            'institution_id'=>$institution,
            'address_id'=>$address_id,
            'type'=>'пациент',
            'approved'=>'2',
        ]);

            DB::table('ima_maticen')->insert([
                'maticen_id'=>auth()->user()->id,
                'pacient_id'=>$user->id
            ]);
        return redirect('/profile/'.$user->id);
    }

    public function edit($id){
        $user=User::find($id);
        $maticen=DB::table('users')
                    ->join('ima_maticen','users.id','=','ima_maticen.maticen_id')
                    ->where('ima_maticen.pacient_id','=',$user->id)
                    ->first();
        if($maticen->id!==auth()->user()->id)
            return redirect('/');
        else{
        $institutions=Institution::all();
        return view('profile.edit',compact('user','institutions'));
        }
    }

    public function update($id){
        $user=User::find($id);
        $address=$user->address;
        if($user->address->city!==request('city')||$user->address->city!==request('street'))
        {
            Address::create([
                'city'=>request('city'),
                'street'=>request('street')
            ]);
            $address=Address::getLast();
        }
        $institution=request('institution');
        if(request('new_inst_confirm')==="new")
        {
            Address::create(['street'=>request('inst_address'),'city'=>request('inst_city')]);
            $address_inst_id=Address::getLast();

            Institution::create(['name'=>request('inst_name'),'address_id'=>$address_inst_id,]);
            $institution=Institution::getLast();
        }
        User::where('id','=',$id)->update([
            'first_name'=>request('име'),
            'last_name'=>request('last_name'),
            'mobile'=>request('mobile'),
            'EMBG'=>request('EMBG'),
            'email'=>request('email'),
            'gender'=>request('gender'),
            'date_born'=>request('date_born'),
            'address_id'=>$address,
            'institution_id'=>$institution
        ]);

        return redirect('/');
    }
    

}
