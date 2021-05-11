<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Helpers\Helper;

class TransactionController extends Controller
{
    public function index($currency, $id){
        $key = 'transaction-' . $id;
        if (\Cache::has($key)) {
            $from = 'cache';
            $data = \Cache::get($key);
        } else {
            $from = 'api';
            $client = new Client();
            $url = sprintf('https://chain.so/api/v2/tx/%s/%s', Helper::network(), $id);
            try {
                $response = $client->request('GET', $url);
            } catch (\Exception $e) {
                return view('errors.404');
            }
            $data = $response->getBody()->getContents();
            \Cache::put($key, $data, config('settings.cache.transaction'));
        }
        $data = json_decode($data);
        if ($data->status === 'fail' or $data->code === 404) {
            return view('errors.404');
        }
        $data = [
            'data' => $data->data,
            'from' => $from,
        ];
        return view('pages.transaction', $data);
    }

    public function allTransactions(){
        return view('pages.all_transactions');
    }
    
}
