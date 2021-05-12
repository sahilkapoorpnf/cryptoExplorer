@extends('layouts.app1')

@section('content')
<div class="exploreBitCoin">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="exploreBitLeft">
                    <div class="bitSelect">
                        <span>{{ __('messages.explorer') }}</span>
                        <div class="form-group">
                            <?php
                            $BTCSelected = ''; 
                            $LTCSelected = ''; 
                            $DOGESelected = ''; 
                            if(\Session::get('cryptoCurrency') === "LTC"){
                                $LTCSelected = 'selected';
                            } else if(\Session::get('cryptoCurrency') === "DOGE"){
                                $DOGESelected = 'selected';
                            } else{
                                $BTCSelected = 'selected';
                            }
                            ?>

                            <select name="crypto_currency" class="form-control websites2" id="c_currency">
                                <option value="BTC" <?php echo $BTCSelected; ?> title="images/BTC.png">Bitcoin</option>
                                <option value="LTC" <?php echo $LTCSelected; ?> title="images/LTC.png">Litecoin</option>
                                <option value="DOGE" <?php echo $DOGESelected; ?> title="images/DOGE.png">Dogecoin</option>
                            </select> 

                        </div>
                    </div>
                    <div class="bitCoin">
                        <p>Blockchain information for 
                        @if(Helper::network() == "LTC")
                            Litecoin
                        @elseif(Helper::network() == "DOGE")
                            Dogecoin
                        @else
                            Bitcoin
                        @endif 

                        ({{ Helper::network() }}) including historical prices, the most recently mined blociks, and data for the latest transactions.</p>
                    </div>
                    <div class="bitCoinSearch">
                        <form action="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), '/search') }}">
                            <input type="hidden" name="currency" value="{{ Helper::network() }}">
                            <input class="form-control rounded-0" type="search" autocomplete="off" name="q" placeholder="{{ __('messages.search_placeholder') }}">
                            <button class="btn btn-light my-2 my-sm-0 rounded-0" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="bitCoinPrice">
                        <div class="row no-gutters">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="bitPriceTxt">
                                    <span>Price</span>
                                    <h3>$50,865.64</h3>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="bitPriceTxt">
                                    <span>Transaction value (est)</span>
                                    <h3>$50,865.64</h3>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="bitPriceTxt">
                                    <span>{{ __('messages.transaction') }}</span>
                                    <h3>$50,865.64</h3>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="bitPriceTxt">
                                    <span>Estimated hash rate</span>
                                    <h3>$50,865.64</h3>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="bitPriceTxt">
                                    <span>Transaction value</span>
                                    <h3>$1238m BTC</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 expBorderLeft">
                <div class="exploreBitRight">
                    <div class="bitRightTop">
                        <h2>{{ __('messages.latest_transactions') }}</h2>
                        <a href="{{ asset(Helper::locale() . Helper::network().'/all-transactions') }}" class="btn">All transactions <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="bitRightData">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">{{ __('messages.hash') }}</th>
                                        <th scope="col">{{ __('messages.time') }}</th>
                                        <th scope="col">{{ __('messages.amount') }} ({{ Helper::network() }})</th>
                                    </tr>
                                </thead>
                                <tbody id="tbl-transactions">
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="bitdivider">
                        <hr>
                    </div>
                    <div class="bitRightTop">
                        <h2>{{ __('messages.latest_block') }}</h2>
                        <a href="{{ asset(Helper::locale() . Helper::network().'/all-blocks') }}" class="btn">All blocks <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="bitRightData">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Height</th>
                                        <th scope="col">{{ __('messages.time') }}</th>
                                        <th scope="col">{{ __('messages.transaction') }}</th>
                                        <th scope="col">{{ __('messages.miner') }}</th>
                                    </tr>
                                </thead>
                                <tbody id="tb2-blocks">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="{{ asset('/js/home.js') }}"></script>
    <script src="{{ asset('/js/uncompressed.jquery.dd.js') }}"></script>
    <script language="javascript" type="text/javascript">
    $(document).ready(function() {
        try {
            $(".websites2").msDropDown({mainCSS:'dd2'});
        } catch(e) {
            alert("Error: "+e.message);
        }
    })
    </script>
@endpush