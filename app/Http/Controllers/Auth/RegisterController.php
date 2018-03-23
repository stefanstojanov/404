<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Address;
use App\Institution;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        if ($data['new_inst_confirm'] === "new")
            return Validator::make($data, [
                'име' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'inst_city' => 'required',
                'street' => 'required',
                'city' => 'required',
                'type' => 'required',
                'gender' => 'required',
                'date_born' => 'required',
                'mobile' => 'required',
                'EMBG'=>'required',


            ]);

        else
            return Validator::make($data, [
                'име' => 'required|string|max:255',

            ]);
             }
    protected function create(array $data)
    {
        Address::create(['city'=>request('city'),'street'=>request('street')]);
        $address_id=Address::getLast();

        if($data['new_inst_confirm']==="new")
        {
            Address::create(['street'=>request('inst_address'),'city'=>request('inst_city')]);
            $address_inst_id=Address::getLast();

            Institution::create(['name'=>$data['inst_name'],'address_id'=>$address_inst_id,]);
            $data['institution']=Institution::getLast();
        }

            return User::create([
            'first_name' => $data['име'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address_id'=>$address_id,
            'institution_id'=>$data['institution'],
            'type'=>$data['type'],
            'date_born'=>$data['date_born'],
            'gender'=>$data['gender'],
            'mobile'=>$data['mobile'],
            'last_name'=>$data['last_name'],
            'EMBG'=>$data['EMBG'],
        ]);
    }
}
