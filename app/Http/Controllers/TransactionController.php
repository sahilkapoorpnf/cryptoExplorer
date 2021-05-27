<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use GuzzleHttp\Client;

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

    public function allTransactions(Request $request){
        /*if ($request->ajax()) {
            $data = $_GET['data'];
            try{
            $client = new Client();
            $response = $client->get('https://pro-api.coinmarketcap.com/v1/tools/price-conversion?amount=10&symbol=BTC', [
                'headers' => [
                    'X-CMC_PRO_API_KEY' => 'b04dcff4-e7e9-4214-a652-f560bbd96b6f',
                ],
            ]);
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }*/
        return view('pages.all_transactions');
    }
    
}
