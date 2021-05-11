<?php
namespace App\Helpers;

use Session;

class Helper {

    public static function network(){
        if(\Session::get('cryptoCurrency') === "LTC"){
            $network = 'LTC';
        } else if(\Session::get('cryptoCurrency') === "DOGE"){
            $network = 'DOGE';
        } else if(\Session::get('cryptoCurrency') === "ETH"){
            $network = 'ETH';
        } else{
            $network = 'BTC';
        }
        return $network;
    }

    public static function locale(){
        return \LaravelLocalization::getCurrentLocale() == config('settings.language') ? '/' : '/' . \LaravelLocalization::getCurrentLocale() . '/';
    }

}

?>