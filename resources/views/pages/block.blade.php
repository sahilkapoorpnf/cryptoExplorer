@extends('layouts.app1')

@section('content')
<div class="exploreTwoStart">
    <div class="exploreTwoTop">
        <div class="container-fluid">
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
        <div class="container-fluid">
            <div class="dashBox">
                <div class="row">
                    <div class="col-12">
                        <div class="exporeSumaaryHead">
                            <h2>{{ __('messages.block') }} {{ $data->block_no }}</h2>
                            <p>This transaction was first broadcast to the Bitcoin network on {{ gmdate('M d, Y', $data->time) }} at  {{ gmdate('H:i', $data->time) }} The transaction is currently
                            <?php 
                            if($data->confirmations > 0){
                                $txConfirmation = 'confirmed';
                            } else{
                                $txConfirmation = 'unconfirmed';
                            } 
                            ?>  
                            {{ $txConfirmation }} by the network.</p>
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
                                            <td> {{ __('messages.hash') }}</td>
                                            <th class="witnesMore" scope="row">
                                                <span id="copy_tx">{{ $data->blockhash }}</span>
                                                <div class="Tooltip">
                                                    <a href="javascript:void(0);" onclick="copyToClipboard('#copy_tx')" onmouseout="outFunc()">
                                                        <span class="tooltiptext" id="myTooltip">Copy Hash</span>
                                                        <i class="far fa-copy"></i>
                                                    </a>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td> {{ __('messages.confirmations') }}</td>
                                            <th scope="row">{{ $data->confirmations }}</th>
                                        </tr>
                                        <tr>
                                            <td> Timestamp</td>
                                            <th scope="row">{{ date("Y-m-d H:i", $data->time) }}</th>
                                        </tr>
                                        <tr>
                                            <td> Height</td>
                                            <th scope="row">{{ $data->block_no }}</th>
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
                                            <td> {{ __('messages.fee') }}</td>
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
        <div class="container-fluid">
            <div class="blockTransitionBox">
                <div class="blockTransheading">
                    <div class="blockLeft">
                        <h2>Block Transactions</h2>
                    </div>

                    <div class="pagination-demo1"></div>
                
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="blockTransitionInn">
                            <div class="table-responsive">
                                <table class="table" id="tableData">

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

@push('js')
    <script src="{{ asset('/js/pagination.js') }}"></script>

    <script>
        $('body').on('mouseout', '.clickmouse', function(){
            var addressIndex = $(this).attr('address-index');
            outFunction(addressIndex, 'block');
        });
        $('body').on('click', '.clickmouse', function(){
            var addressId = $(this).attr('address-id');
            var index = $(this).attr('index');
            copyToClipboardAddress(addressId, index);
        });

        (function(name) {
            var container = $('.pagination-' + name);
            var transactions = {!! json_encode($data->txs) !!} ;
            e = $(".base_url").attr("data-attr");
            var sources = function () {
                var result =  transactions ;
                return result;
            }();
            var options = {
                dataSource: sources,
                callback: function (response, pagination) {
                    var finalHtml = '<tbody>';
                    $.each(response, function (index, item) {
                        var id = '#copy_address_'+index;
                        var dataHtml1 ='<tr><td>Hash</td><td><div class="tbflex"><span id="copy_address_'+index+'">'+item.txid + ' ' +' </span><div class="Tooltip"> <a href="javascript:void(0);" index="'+ index +'" address-id="#copy_address_'+index+'" address-index="'+index+'" class="clickmouse"> <span class="tooltiptext" id="myTooltip_'+index+'">Copy Hash</span> <i class="far fa-copy"></i> </a> </div></div> </td><td colspan="2"> <p>2021-04-24 <span>22:35</span></p></td></tr>';
                        var dataHtml2 = '';
                        var dataHtml3 = '';
                        var mainHtml = '';
                        $.each(item.inputs, function (k, v) {
                            if(v.received_from == null){ 
                                var data =  "{{ __('messages.newly_generated_coins') }}";
                            } else{ 
                                var data = '<a href="' + e + window.locale_path.substring(1, window.locale_path.length) + window.network + "/addresses/" + v.address + '">' + v.address + '</a> ';
                            }
                            dataHtml2 +='<div class="summryDiv">' + data + '<span>' + v.value + ' ' + window.network + ' ' +'<a href="javascript:void(0);"><i class="fas fa-globe"></i></a></span></div>';
                        });

                        $.each(item.outputs, function (k, v) {
                            if(v.address == 'nulldata'){ 
                                var data1 =  "{{ __('messages.nonstandard') }}";
                            } else{ 
                                var data1 = '<a href="' + e + window.locale_path.substring(1, window.locale_path.length) + window.network + "/addresses/" + v.address + '">' + v.address + '</a> ';
                            }
                            dataHtml3 +='<div class="summryDiv text-right">' + data1 + '<span>' + v.value + ' ' + window.network + ' ' + '<a href="javascript:void(0);"><i class="fas fa-globe"></i></a></span></div>';
                        });

                        mainHtml +='<tr><td></td><td>' + dataHtml2 + '<td><i class="fas fa-caret-right"></i></td><td>' + dataHtml3 + '</td</tr>'

                        var dataHtml4 ='<tr><td> Fee </td> <td colspan="2"> <span>' + item.fee + ' ' + window.network + '</span> <span>(19.442 sat/B -5.531 sat/WU - 693 bytes)</span> </td> <td><div class="summrySuccess"><a href="javascript:void(0);">' + item.fee + window.network + '</a></td></tr>'; 

                        finalHtml +=dataHtml1 + mainHtml + dataHtml4;
                    });
                    finalHtml += '</tbody>';
                    $('#tableData').html(finalHtml);
                }
            };
            container.pagination(options);
        })('demo1');

    </script>

@endpush

