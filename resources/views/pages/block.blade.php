@extends('layouts.app1')

@section('content')
<div class="exploreTwoStart">
    <div class="exploreTwoTop">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="exploreTwoLeft">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);">Bitcoin explorer</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:void(0);">{{ __('messages.transaction') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="exploreTwoRight">
                        <div class="exploreTwoSearch">
                            <form action="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), '/search') }}">
                                <input type="hidden" name="currency" value="{{ Helper::network() }}">
                                <input class="form-control rounded-0" type="search" name="q" placeholder="{{ __('messages.search_placeholder') }}">
                                <button class="btn btn-light my-2 my-sm-0 rounded-0" type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="exporeSumaary">
        <div class="container">
            <div class="dashBox">
                <div class="row">
                    <div class="col-12">
                        <div class="exporeSumaaryHead">
                            <h2>{{ __('messages.block') }} {{ $data->block_no }}</h2>
                            <p>This transaction was first broadcast to the Bitcoin network on April 24, 2021 at 10:54 GMT+2. The transaction is currently unconfirmed by the network.</p>
                        </div>
                    </div>
                </div>
                <div class="row detailData">
                    <div class="col-md-12">
                        <div class="exporedetailData">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td> Hash</td>
                                            <th class="witnesMore" scope="row"><span>{{ $data->blockhash }} <a href="javascript:void(0);"><i class="far fa-folder"></i></a></span></th>
                                        </tr>
                                        <tr>
                                            <td> Confirmation</td>
                                            <th scope="row">{{ $data->confirmations }}</th>
                                        </tr>
                                        <tr>
                                            <td> Timestamp</td>
                                            <th scope="row">{{ date("Y-m-d H:i", $data->time) }}</th>
                                        </tr>
                                        <tr>
                                            <td> Height</td>
                                            <th scope="row">627985 s</th>
                                        </tr>
                                        <tr>
                                            <td> Miner</td>
                                            <th scope="row">{{ $data->miner }}</th>
                                        </tr>
                                        <tr>
                                            <td> Number of Transactions</td>
                                            <th scope="row">{{ count($data->txs) }}</th>
                                        </tr>
                                        <tr>
                                            <td> Difficulty</td>
                                            <th scope="row">{{ $data->mining_difficulty }}</th>
                                        </tr>
                                        <tr>
                                            <td> Merkle Root</td>
                                            <th class="witnesMore" scope="row"><span>{{ $data->merkleroot }}</span></th>
                                        </tr>
                                        <tr>
                                            <td> Version</td>
                                            <th scope="row">{{ $data->version }}</th>
                                        </tr>
                                        <tr>
                                            <td> Bits</td>
                                            <th scope="row">{{ $data->bits }}</th>
                                        </tr>
                                        <tr>
                                            <td> Wight</td>
                                            <th scope="row">3993,083 WU s</th>
                                        </tr>
                                        <tr>
                                            <td> Size</td>
                                            <th scope="row">{{ $data->size }} bytes</th>
                                        </tr>
                                        <tr>
                                            <td> Nonce</td>
                                            <th scope="row">{{ $data->nonce }}</th>
                                        </tr>
                                        <tr>
                                            <td> Transaction Value</td>
                                            <th scope="row">{{ $data->sent_value }} {{ Helper::network() }}</th>
                                        </tr>
                                        <tr>
                                            <td> Block Reward</td>
                                            <th scope="row">62.2500000 BTC s</th>
                                        </tr>
                                        <tr>
                                            <td> {{ __('messages.fees') }}</td>
                                            <th scope="row">{{ $data->fee }} {{ Helper::network() }}</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blockTransition">
        <div class="container">
            <div class="blockTransitionBox">
                <div class="blockTransheading">
                    <div class="blockLeft">
                        <h2>Block Transactions</h2>
                    </div>
                    <!-- <div class="blockRight d-none d-sm-block">
                        <nav aria-label="...">
                            <ul class="pagination pagination-lg">
                                <li class="page-item active" aria-current="page">
                                    <span class="page-link">1</span>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">
                                    <i class="fas fa-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="blockTransitionInn">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        @foreach($data->txs as $transaction)
                                            <tr>
                                                <td>
                                                    Hash
                                                </td>
                                                <td>
                                                    <span>{{ $transaction->txid }} <a href="javascript:void(0);"><i class="far fa-folder"></i></a></span>
                                                </td>
                                                <td colspan="2">
                                                    <p>2021-04-24 <span>22:35</span></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    @foreach($transaction->inputs as $item)
                                                    <div class="summryDiv">
                                                        @if(empty($item->received_from))
                                                            {{ __('messages.newly_generated_coins') }}
                                                        @else
                                                            <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), asset(Helper::network(). '/addresses/'. $item->address)) }}">{{ $item->address }}</a>
                                                        @endif

                                                        <span>{!! $item->value !!} {{ Helper::network() }}</span>
                                                        <a href="javascript:void(0);"><i class="fas fa-globe"></i></a>
                                                    </div>
                                                    @endforeach

                                                </td>
                                                <td>
                                                    <i class="fas fa-caret-right"></i>
                                                </td>
                                                <td>
                                                    @foreach($transaction->outputs as $item)
                                                    <div class="summryDiv text-right">
                                                        @if(wrong_address($item->address))
                                                            {{ __('messages.nonstandard') }}
                                                        @else
                                                            <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), asset(Helper::network(). '/addresses/'. $item->address)) }}">{{ $item->address }}</a>
                                                        @endif
                                                        <span>{!! $item->value !!} {{ Helper::network() }}</span>
                                                        <a href="javascript:void(0);"><i class="fas fa-globe"></i></a>
                                                    </div>
                                                    @endforeach

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Fee
                                                </td>
                                                <td colspan="2">
                                                    <span>{{ $transaction->fee }} {{ Helper::network() }}</span> <br>
                                                    <span>(19.442 sat/B -5.531 sat/WU - 693 bytes)</span>
                                                </td>
                                                <td>
                                                    <div class="summrySuccess">
                                                        <a href="javascript:void(0);">{{ $transaction->fee }} {{ Helper::network() }}</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- <div class="blockTransheading border-0 pt-0 pb-0">
                                <div class="blockRight pagiBottom">
                                    <nav aria-label="...">
                                        <ul class="pagination pagination-lg">
                                            <li class="page-item active" aria-current="page">
                                                <span class="page-link">1</span>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                                            <li class="page-item"><a class="page-link" href="#">
                                                <i class="fas fa-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

