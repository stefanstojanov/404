<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Address;
use App\Institution;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'email', 'password','last_name','mobile','address_id','institution_id','gender','date_born','type','EMBG','approved',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected function address(){
        return $this->belongsTo(Address::Class);
    }

    protected function institution(){
        return $this->hasOne(Institution::Class);
    }
    
    public function isAdministrator(){
        if($this->type=='Администратор')
            return true;
        else
            return false;
    }

    public function isMaticen(){
        if($this->type=='Матичен')
            return true;
        else
            return false;
    }

    public function isLaborant(){
        if($this->type=='Лаборант')
            return true;
        else
            return false;
    }
    
    public function isPacient(){
        if($this->type=='пациент')
            return true;
        else
            return false;
    }

    public static function getPacient(){
        $maticen=auth()->user();
        $pacient=DB::table('ima_maticen')
            ->join('users','ima_maticen.pacient_id','=','users.id')
            ->where('maticen_id','=',$maticen->id)
            ->first();
        return $pacient;
    }

    public static function getMaticen(){
        $pacient=auth()->user();
        $maticen=DB::table('ima_maticen')
            ->join('users','ima_maticen.maticen_id','=','users.id')
            ->where('pacient_id','=',$pacient->id)
            ->first();
        return $maticen;
    }

}
