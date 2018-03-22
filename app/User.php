<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Address;
use App\Institution;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'email', 'password','last_name','mobile','address_id','institution_id','gender','date_born','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','EMBG',
    ];

    protected function address(){
        return $this->belongsTo(Address::Class);
    }

    protected function institution(){
        return $this->hasOne(Institution::Class);
    }

}
