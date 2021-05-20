@extends('layouts.app1')

@section('title')
    {{ __('messages.address') }} {{ $data->address }}
@endsection

@section('content')

    <div class="exploreTwoStart">
        <div class="exploreTwoTop">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="exploreTwoLeft">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ asset(Helper::locale()) }}">
                                    @if(Helper::network() == "LTC")
                                    Litecoin
                                    @elseif(Helper::network() == "DOGE")
                                        Dogecoin
                                    @else
                                        Bitcoin
                                    @endif

                                    explorer
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle">{{ __('messages.address') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="exploreTwoRight">
                            <div class="exploreTwoSearch">
                                <form action="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), '/search') }}">
                                    <input type="hidden" name="currency" value="{{ Helper::network() }}">
                                    <input class="form-control rounded-0" type="search" autocomplete="off" name="q" placeholder="{{ __('messages.search_placeholder') }}">
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
                                <h2>Address</h2>
                                @if(Helper::network() == "LTC")
                                    @php $coin = 'Litecoin'; @endphp
                                @elseif(Helper::network() == "DOGE")
                                    @php $coin = 'Dogecoin'; @endphp
                                @else
                                    @php $coin = 'Bitcoin'; @endphp
                                @endif

                                <?php 
                                $received = 0;
                                $sent = 0;
                                foreach($transactions as $k => $transaction){
                                    if($transaction->is_incoming){
                                        $received += $transaction->value;
                                    } else{
                                        $sent += $transaction->value;
                                    }
                                }
                                ?>

                                <p>This address has transacted {{ $data->total_txs }} times on the {{ $coin }} blockchain. It has received a total of {{ $received }} {{ Helper::network() }} and has sent a total of {{ $sent }} {{ Helper::network() }} . The current value of this address is {{ $data->balance }} {{ Helper::network() }} .</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="addressUpper">
                                @if(Helper::network() == "LTC")
                                    @php $cCurrency = 'litecoin'; @endphp
                                @elseif(Helper::network() == "DOGE")
                                    @php $cCurrency = 'dogecoin'; @endphp
                                @else
                                    @php $cCurrency = 'bitcoin'; @endphp
                                @endif

                                <div class="addressBarcode">
                                    <!-- <img src='https://www.bitcoinqrcodemaker.com/api/?style={{$cCurrency}}&address={{$data->address}}' alt=""> -->
                                    <img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl={{$data->address}}' alt="">
                                </div>
                                <div class="addressData">
                                    <div class="dataAllTrans">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th scope="col">{{ __('messages.address') }}</th>
                                                        <td class="addreMore">
                                                            <span id="copy_tx">{{ $data->address }}</span>
                                                            <div class="Tooltip">
                                                                <a href="javascript:void(0);" onclick="copyToClipboard('#copy_tx')" onmouseout="outFunc('address')">
                                                                    <span class="tooltiptext" id="myTooltip">Copy Address</span>
                                                                    <i class="far fa-copy"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">Format</th>
                                                        <td><span class="base5">BASE58 (P2SH) s</span></td> 
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">Transactions</th>
                                                        <td>{{ $data->total_txs }}</td> 
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">Total Received</th>
                                                        <td>{{ $received }} {{ Helper::network() }}</td> 
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">Total Sent</th>
                                                        <td>{{ $sent }} {{ Helper::network() }}</td> 
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">Final Blance</th>
                                                        <td>{{ $data->balance }} {{ Helper::network() }}</td> 
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
            </div>
        </div>
        <div class="blockTransition">
            <div class="container">
                <div class="blockTransitionBox">
                    <div class="blockTransheading">
                        <div class="blockLeft">
                            <h2>{{ __('messages.transactions') }}</h2>
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
                                            @foreach($transactions as $k => $transaction)
                                            <tr>
                                                <td>
                                                    Hash
                                                </td>
                                                <td>
                                                    <span id="copy_hash_{{ $k }}">{{ $transaction->txid }}</span>
                                                    <div class="Tooltip">
                                                        <a href="javascript:void(0);" onclick="copyToClipboardAddress('#copy_hash_{{ $k }}', '{{ $k }}')" onmouseout="outFunction('{{ $k }}', 'address')">
                                                            <span class="tooltiptext" id="myTooltip_{{ $k }}">Copy Hash</span>
                                                            <i class="far fa-copy"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td colspan="2">
                                                    <p>{{ date("Y-m-d", $transaction->unixtime) }} <span>{{ date("H:i", $transaction->unixtime) }}</span></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                </td>
                                                <td>
                                                    @if($transaction->inputs)
                                                        @foreach($transaction->inputs as $item)
                                                    <div class="summryDiv">
                                                        @if(wrong_address($item->address))
                                                            {{ __('messages.newly_generated_coins') }}
                                                        @else
                                                            <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), asset(Helper::network(). '/addresses/'. $item->address)) }}">
                                                                {{ $item->address }}
                                                            </a>
                                                        @endif

                                                        <span>{{ $transaction->value }} {{ Helper::network() }}</span>
                                                        <a href="javascript:void(0);"><i class="fas fa-globe"></i></a>
                                                    </div>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>
                                                    <i class="fas fa-caret-right"></i>
                                                </td>
                                                <td>
                                                    @if($transaction->outputs)
                                                        @foreach($transaction->outputs as $item)
                                                            <div class="summryDiv text-right">
                                                                @if(wrong_address($item->address))
                                                                    {{ __('messages.nonstandard') }}
                                                                @else
                                                                    <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), asset(Helper::network(). '/addresses/'. $item->address)) }}">
                                                                        {{ $item->address }}
                                                                    </a>
                                                                @endif
                                                                <span>{!! $item->value !!} {{ Helper::network() }}</span>
                                                                <a href="javascript:void(0);"><i class="fas fa-globe"></i></a>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Fee
                                                </td>
                                                <td colspan="2">
                                                    <span>0.06255212 BTC s</span> <br>
                                                    <span>(19.442 sat/B -5.531 sat/WU - 693 bytes) s</span>
                                                </td>
                                                <td>
                                                    <div class="summrySuccess">
                                                        <a href="javascript:void(0);">{{ $transaction->value }} {{ Helper::network() }}</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

