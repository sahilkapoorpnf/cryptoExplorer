<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\Helper;
use GuzzleHttp\Client;
use App\Models\Block;



class BlockCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pusher:blocks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $client1 = new Client();
        $clientBtc = new Client();
        $client2 = new Client();
        $clientLtc = new Client();
        $client3 = new Client();
        $clientDoge = new Client();

        $jsonResponse = $client1->get('https://chain.so/api/v2/get_info/BTC');
        $response = json_decode($jsonResponse->getBody(), true);
        if (Block::where([['block_no', $response['data']['blocks']], ['network', 'BTC']])->count() == 0) {
            $lastInsertedBlock = Block::where('network', 'BTC')->orderBy('id', 'desc')->first();
            $pendingBlock = [];
            for ($i=$lastInsertedBlock['block_no']+1; $i < $response['data']['blocks']; ++$i) { 
                $pendingBlock[] = $i;
            }
            $pendingBlock = array_merge($pendingBlock, [$response['data']['blocks']]);
            foreach ($pendingBlock as $key => $value) {
                $jsonResponse1 = $clientBtc->get('https://chain.so/api/v2/get_block/BTC/'.$value);
                $response1 = json_decode($jsonResponse1->getBody(), true);
                $data = [
                        'block_no' => $response1['data']['block_no'],
                        'blockhash' => $response1['data']['blockhash'],
                        'network' => $response1['data']['network'],
                        'size' => $response1['data']['size'],
                        'time' => $response1['data']['time'],
                        'total_txs' => count($response1['data']['txs'])
                        ];  
                Block::create($data);
            }
        }

        $jsonResponse2 = $client2->get('https://chain.so/api/v2/get_info/LTC');
        $response2 = json_decode($jsonResponse2->getBody(), true);
        if (Block::where([['block_no', $response2['data']['blocks']], ['network', 'LTC']])->count() == 0) {
            $lastInsertedBlock = Block::where('network', 'LTC')->orderBy('id', 'desc')->first();
            $pendingBlock = [];
            for ($i=$lastInsertedBlock['block_no']+1; $i < $response2['data']['blocks']; ++$i) { 
                $pendingBlock[] = $i;
            }
            $pendingBlock = array_merge($pendingBlock, [$response2['data']['blocks']]);
            foreach ($pendingBlock as $key => $value) {
                $jsonResponseLtc = $clientLtc->get('https://chain.so/api/v2/get_block/LTC/'.$value);
                $responseLtc = json_decode($jsonResponseLtc->getBody(), true);
                $data2 = [
                        'block_no' => $responseLtc['data']['block_no'],
                        'blockhash' => $responseLtc['data']['blockhash'],
                        'network' => $responseLtc['data']['network'],
                        'size' => $responseLtc['data']['size'],
                        'time' => $responseLtc['data']['time'],
                        'total_txs' => count($responseLtc['data']['txs'])
                        ];  
                Block::create($data2);
            }
        }

        $jsonResponse3 = $client3->get('https://chain.so/api/v2/get_info/DOGE');
        $response3 = json_decode($jsonResponse3->getBody(), true);
        if (Block::where([['block_no', $response3['data']['blocks']], ['network', 'DOGE']])->count() == 0) {
            $lastInsertedBlock = Block::where('network', 'DOGE')->orderBy('id', 'desc')->first();
            $pendingBlock = [];
            for ($i=$lastInsertedBlock['block_no']+1; $i < $response3['data']['blocks']; ++$i) { 
                $pendingBlock[] = $i;
            }
            $pendingBlock = array_merge($pendingBlock, [$response3['data']['blocks']]);
            foreach ($pendingBlock as $key => $value) {
                $jsonResponseDoge = $clientDoge->get('https://chain.so/api/v2/get_block/DOGE/'.$value);
                $responseDoge = json_decode($jsonResponseDoge->getBody(), true);
                $data3 = [
                        'block_no' => $responseDoge['data']['block_no'],
                        'blockhash' => $responseDoge['data']['blockhash'],
                        'network' => $responseDoge['data']['network'],
                        'size' => $responseDoge['data']['size'],
                        'time' => $responseDoge['data']['time'],
                        'total_txs' => count($responseDoge['data']['txs'])
                        ];  
                Block::create($data3);
            }
        }

    }

}
