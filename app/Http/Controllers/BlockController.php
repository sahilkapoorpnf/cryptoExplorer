<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use GuzzleHttp\Client;
use App\Models\Block;

class BlockController extends Controller
{
    public function index($id){
        $key = 'block-' . $id;
        if (\Cache::has($key)) {
            $from = 'cache';
            $data = \Cache::get($key);
        } else {
            $from = 'api';
            $client = new Client();
            $url = sprintf('https://chain.so/api/v2/block/%s/%s', Helper::network(), $id);
            try {
                $response = $client->request('GET', $url);
            } catch (\Exception $e) {
                return view('errors.404');
            }
            $data = $response->getBody()->getContents();
            \Cache::put($key, $data, config('settings.cache.block'));
        }
        $data = json_decode($data);
        if ($data->status === 'fail' or $data->code === 404) {
            return view('errors.404');
        }
        $data = [
            'data' => $data->data,
            'from' => $from,
        ];
        return view('pages.block', $data);
    }

    public function allBlocks(Request $request){
        /*if ($request->ajax()) {
            $data = $_GET['data'];
            if (Block::where('block_no', $data['block_no'])->count() == 0) {
                Block::create($data);
            }
            return true;
        }*/
        /*$blocks = Block::where('network', Helper::network())->orderBy('id', 'desc')->paginate(20);*/
        $blocks = Block::where('network', Helper::network())->orderBy('id', 'desc')->take(20)->get();
        return view('pages.all_blocks', compact('blocks'));
    }

}
