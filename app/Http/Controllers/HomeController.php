<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(){
        return view('pages.home');
    }

    public function cryptoCurrency($currency){
    	Session::forget('cryptoCurrency');
    	Session::put('cryptoCurrency', $currency);
    	return true;
    }

}
