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
                                <a class="nav-link" href="javascript:void(0);">
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
                            <h2>Summary</h2>
                            <p>This transaction was first broadcast to the Bitcoin network on April 24, 2021 at 10:54 GMT+2. The transaction is currently unconfirmed by the network. At the time of this transaction</p>
                        </div>
                    </div>
                </div>
                <div class="row sumaaryData">
                    <div class="col-md-12">
                        <div class="exporeSumaaryData">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                {{ __('messages.hash') }}
                                            </td>
                                            <td>
                                                <span id="copy_tx">{{ $data->txid }}</span>
                                                <div class="Tooltip">
                                                    <a href="javascript:void(0);" onclick="copyToClipboard('#copy_tx')" onmouseout="outFunc()">
                                                        <span class="tooltiptext" id="myTooltip">Copy Hash</span>
                                                        <i class="far fa-copy"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td colspan="2">
                                                <p>{{ date('Y-m-d', $data->time) }} <span>{{ date('H:i', $data->time) }}</span></p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                            </td>
                                            <td>
                                                @foreach($data->inputs as $item)
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
                                                @foreach($data->outputs as $item)
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
                                                {{ __('messages.fee') }}
                                            </td>
                                            <td colspan="2">
                                                <span>{{ $data->fee }} {{ Helper::network() }}</span> <br>
                                                <span>(19.442 sat/B -5.531 sat/WU - 693 bytes)</span>
                                            </td>
                                            <td>
                                                <div class="summrySuccess">
                                                    <a href="javascript:void(0);">{{ $data->sent_value }} {{ Helper::network() }}</a>
                                                    @if($data->confirmations > 0)
                                                    <span>Confirmed</span>
                                                    @else
                                                    <span>Unconfirmed</span>
                                                    @endif

                                                </div>
                                            </td>
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
    <div class="exporeDetail">
        <div class="container">
            <div class="dashBox">
                <div class="row">
                    <div class="col-12">
                        <div class="exporeDetailHead">
                            <h2>Details</h2>
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
                                            <td> Status</td>
                                            @if($data->confirmations > 0)
                                            <th scope="row">Confirmed</th>
                                            @else
                                            <th scope="row">Unconfirmed</th>
                                            @endif

                                            <td> {{ __('messages.confirmations') }}</td>
                                            <th scope="row">{{ $data->confirmations }}</th>
                                            <td> Free per byte</td>
                                            <th scope="row">19.442 sat/B</th>
                                        </tr>
                                        <tr>
                                            <td> Recieved Time</td>
                                            <th scope="row">{{ date("Y-m-d H:i", $data->time) }}</th>
                                            <td> Total Input</td>
                                            <th scope="row">{{ $data->sent_value }} {{ Helper::network() }}</th>
                                            <td> Free per weight unit</td>
                                            <th scope="row">5.531 sat/WU</th>
                                        </tr>
                                        <tr>
                                            <td> Size</td>
                                            <th scope="row">{{ $data->size }} bytes</th>
                                            <td> Total Output</td>
                                            @php $toc = 0; @endphp
                                            @foreach($data->outputs as $i)
                                                @php $toc += $i->value; @endphp
                                            @endforeach

                                            <th scope="row">{{ $toc }} {{ Helper::network() }}</th>
                                            <td> Value when transacted</td>
                                            <th scope="row">$266.95</th>
                                        </tr>
                                        <tr>
                                            <td> Wight</td>
                                            <th scope="row">2,436...</th>
                                            <td> {{ __('messages.fee') }}</td>
                                            <th scope="row">{{ $data->fee }} {{ Helper::network() }}</th>
                                            <td> Included in Block</td>
                                            <th scope="row"><a href="javascript:void(0);">{{ isset($data->block_no) ? $data->block_no : 'Unassigned'}}</a></th>
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
    <div class="exploreInputOuter">
        <div class="container">
            <div class="dashBox exploreInputInn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="exploreInputData">
                            <ul class="nav nav-pills mb-3 pillExplore" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">{{ __('messages.inputs') }}({{ count($data->inputs) }})</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">{{ __('messages.outputs') }}({{ count($data->outputs) }})</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                @foreach($data->inputs as $item)
                                                <tr>
                                                    <td> Index</td>
                                                    <td> <span>{{ $item->input_no }}</span></td>
                                                    <td> Details <a href="javascript:void(0);">Output</a></td>
                                                </tr>
                                                <tr>
                                                    <td> {{ __('messages.address') }}</td>
                                                    <td> 
                                                        <span id="copy_address_{{ $item->input_no }}" class="textBlue">{{ $item->address }}</span>
                                                        <div class="Tooltip">
                                                            <a href="javascript:void(0);" onclick="copyToClipboardAddress('#copy_address_{{ $item->input_no }}', '{{ $item->input_no }}')" onmouseout="outFunction('{{ $item->input_no }}')">
                                                                <span class="tooltiptext" id="myTooltip_{{ $item->input_no }}">Copy Address</span>
                                                                <i class="far fa-copy"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td> Value <a href="javascript:void(0);">{!! $item->value !!} {{ Helper::network() }}</a></td>
                                                </tr>
                                                <tr>
                                                    <td> Pkscript</td>
                                                    <td class="witnesMore"> <span><a href="javascript:void(0);">OP_DUP <br>
                                                        OP_HASH160 <br>
                                                        0b8b904c7a25f462ce80b6a134c3df2ed239e151 <br>
                                                        OP_EQUALVERIFY <br>
                                                        OP_CHECKSIG
                                                    </a></span></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td> Sigscript</td>
                                                    <td class="witnesMore"> <span><a href="javascript:void(0);">3044022069ad23a3cdcfe1db58cefe40b93005d880927b4404bed4d53a14d25de03db6e80220 <br>
                                                        0f5c12efad830942df8334debca8f68d062eef6ef9d1e1567181494b99a9764d01 <br>
                                                        0f5c12efad830942df8334debca8f68d062eef6ef9d1e1567181494b99a9764d01
                                                    </a></span></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td> Witness</td>
                                                    <td class="witnesMore"> <span>
                                                        @if($item->witness)
                                                        @foreach($item->witness as $w)
                                                            <a href="javascript:void(0);">{{ $w }}</a></br>
                                                        @endforeach
                                                        @else
                                                        <span>Null</span>
                                                        @endif
                                                    </span></td>
                                                    <td></td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                @foreach($data->outputs as $item)
                                                <tr>
                                                    <td> Index</td>
                                                    <td> <span>{{ $item->output_no }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td> {{ __('messages.address') }}</td>
                                                    <td> 
                                                        <span id="copy_address_output_{{ $item->output_no }}" class="textBlue">{{ $item->address }}</span>
                                                        <div class="Tooltip">
                                                            <a href="javascript:void(0);" onclick="copyToClipboardAddressOutput('#copy_address_output_{{ $item->output_no }}', '{{ $item->output_no }}')" onmouseout="outFunctionOutput('{{ $item->output_no }}')">
                                                                <span class="tooltiptext" id="myTooltips_{{ $item->output_no }}">Copy Address</span>
                                                                <i class="far fa-copy"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td> Value <a href="javascript:void(0);">{!! $item->value !!} {{ Helper::network() }}</a></td>
                                                </tr>
                                                <tr>
                                                    <td> Pkscript</td>
                                                    <td class="witnesMore"> <span>
                                                        <?php  $res = explode(" ", $item->script_asm); ?>
                                                        @foreach($res as $r)
                                                            <a href="javascript:void(0);">{{ $r }}</a></br>
                                                        @endforeach

                                                    </span></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td> Sigscript</td>
                                                    <td class="witnesMore"> <span><a href="javascript:void(0);">3044022069ad23a3cdcfe1db58cefe40b93005d880927b4404bed4d53a14d25de03db6e80220 <br>
                                                        0f5c12efad830942df8334debca8f68d062eef6ef9d1e1567181494b99a9764d01 <br>
                                                        0f5c12efad830942df8334debca8f68d062eef6ef9d1e1567181494b99a9764d01
                                                    </a></span></td>
                                                    <td></td>
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
    </div>
</div>
@endsection
