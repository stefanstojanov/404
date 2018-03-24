<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Institution extends Model
{
    protected $fillable=['name','address_id','city'];

    protected function User(){
        return $this->hasMany(User::Class);
    }

    public static function getLast(){
        return Institution::latest()->orderBy('id','desc')->first()->id;
    }
}
