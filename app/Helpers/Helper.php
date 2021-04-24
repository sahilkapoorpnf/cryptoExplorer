<?php
namespace App\Helpers;

use Session;

class Helper {

    public static function network(){
        if(\Session::get('cryptoCurrency') === "BCH"){
            $network = 'BCH';
        } else if(\Session::get('cryptoCurrency') === "DOGE"){
            $network = 'DOGE';
        } else{
            $network = 'BTC';
        }
        return $network;
    }

}

?>