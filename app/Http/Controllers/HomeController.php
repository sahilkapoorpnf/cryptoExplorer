<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use GuzzleHttp\Client;
use App\Models\Block;

class HomeController extends Controller
{
    public function index(){
    	/*$client = new Client();
    	$response = $client->get('https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest', [
    	    'headers' => [
    	        'X-CMC_PRO_API_KEY' => 'b04dcff4-e7e9-4214-a652-f560bbd96b6f',
    	    ],
    	]);
    	$response = json_decode($response->getBody(), true);*/

        /*if ($request->ajax()) {
            $data = $_GET['data'];
            if (Block::where('block_no', $data['block_no'])->count() == 0) {
                Block::create($data);
            }
            return true;
        }*/
        $client = new Client();
        $response = $client->get('https://api.blockchain.info/stats');
        $response = json_decode($response->getBody(), true);
        $blocks = Block::where('network', Helper::network())->orderBy('id', 'desc')->take(10)->get();
        return view('pages.home', compact('blocks', 'response'));
    }

    public function cryptoCurrency($currency){
    	Session::forget('cryptoCurrency');
    	Session::put('cryptoCurrency', $currency);
    	return true;
    }

}
