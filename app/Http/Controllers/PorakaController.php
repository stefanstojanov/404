<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
require_once "vendor/autoload.php";
use Twilio\Rest\Client;
class PorakaController extends Controller
{
    public function isprati(){
        
        $account_sid = "ACec99e22f27761516e17ccf1ab3cf6555";
        $auth_token = "098c99f9c0d7958be44207f14535d73e";
        $twilio_phone_number = "+1773-832-5196";

        $client = new Client($account_sid, $auth_token);

        $client->messages->create(
    '+38978929077',
    array(
        "from" => $twilio_phone_number,
        "body" => "Napravi go preku laravel"
    )
);
    }
}
