<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Address extends Model
{
    protected $fillable=['street','city'];

    protected function User(){
        return $this->hasMany(User::Class);
    }

    public static function getLast(){
        return Address::latest()->orderBy('id','desc')->first()->id;
    }
}
