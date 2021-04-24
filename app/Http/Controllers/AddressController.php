<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Helpers\Helper;

class AddressController extends Controller
{
    public function index($currency, $id){
        $key = 'address-' . $id;
        if (\Cache::has($key)) {
            $from = 'cache';
            $data = \Cache::get($key);
        } else {
            $from = 'api';
            $client = new Client();
            /*$url = sprintf('https://chain.so/api/v2/address/%s/%s', config('settings.network'), $id);*/
            $url = sprintf('https://chain.so/api/v2/address/%s/%s', Helper::network(), $id);
            try {
                $response = $client->request('GET', $url);
            } catch (\Exception $e) {
                return view('pages.error');
            }
            $data = $response->getBody()->getContents();
            \Cache::put($key, $data, config('settings.cache.address'));
        }
        $data = json_decode($data);
        if ($data->status === 'fail' or $data->code === 404) {
            return view('pages.error');
        }
        $transactions = [];
        foreach ($data->data->txs as $transaction) {
            $isIncoming = !property_exists($transaction, 'outgoing');
            $value = $isIncoming ? $transaction->incoming->value : $transaction->outgoing->value;
            $transactions[] = (object)[
                'unixtime' => $transaction->time,
                'txid' => $transaction->txid,
                'block_no' => $transaction->block_no,
                'type' => $isIncoming ? 'input' : 'output',
                'is_incoming' => $isIncoming,
                'value' => $value,
                'balance_value' => $isIncoming ? $value : -$value,
                'inputs' => property_exists($transaction, 'incoming') ? $transaction->incoming->inputs : [],
                'outputs' => property_exists($transaction, 'outgoing') ? $transaction->outgoing->outputs : [],
            ];
        }
        $transactions = collect($transactions);
        $inputCounter = $transactions->where('type', '=', 'input')->count();
        $balance = $data->data->balance + $data->data->pending_value;
        $last = 0;
        $balanceHistory = [];
        foreach ($transactions as $transaction) {
            $balance -= $last;
            $last = $transaction->balance_value;
            $balanceHistory[] = (object)['time' => $transaction->unixtime, 'value' => $balance];
        }
        $data = [
            'total_txs' => $data->data->total_txs,
            'data' => $data->data,
            'transactions' => $transactions,
            'from' => $from,
            'input_counter' => $inputCounter,
            'output_counter' => $transactions->count() - $inputCounter,
            'history' => collect($balanceHistory)->reverse(),
        ];
        return view('pages.address', $data);
    }
}
