@extends('layouts.app')

@section('title')
    {{ __('messages.address') }} {{ $data->address }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>{{ __('messages.address') }}</h1>
                <h4 class="text-secondary">{{ $data->address }}</h4>

                <div class="card-group mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center text-uppercase">{{ __('messages.received') }}</h4>
                            <p class="card-text text-center">{{ $data->received_value }} {{ $network }}</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center text-uppercase">{{ __('messages.pending') }}</h4>
                            <p class="card-text text-center">{{ $data->pending_value }} {{ $network }}</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center text-uppercase">{{ __('messages.balance') }}</h4>
                            <p class="card-text text-center">{{ $data->balance }} {{ $network }}</p>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <h2>{{ __('messages.balance_history') }}</h2>
                        <div class="sparkline" values="@foreach($history as $item) {{ $item->time }}:{{ $item->value }}@if(!$loop->last),@endif @endforeach" style="width: 100%;height:400px;"></div>
                    </div>
                </div>

                <h2 class="mt-5">
                    {{ __('messages.transactions') }} ({{ count($transactions) < 50 || count($transactions) < $total_txs ? count($transactions) : $total_txs }})
                </h2>

                @foreach($transactions as $transaction)
                    @if ($loop->iteration > 2)
                        @break
                    @endif
                    @include('partials.address.transaction', ['transaction' => $transaction])
                @endforeach

                @if(count($transactions) > 2)
                <div class="text-center mt-4">
                    <button class="btn btn-outline-primary js-hide-container" type="button" data-toggle="collapse" data-target="#tblTransactions" aria-expanded="false" aria-controls="tblTransactions">
                        <i class="fas fa-angle-down"></i> {{ __('messages.load_more_transactions') }}
                    </button>
                </div>
                @endif

                <div class="collapse mt-4" id="tblTransactions">
                    @foreach($transactions as $transaction)
                        @if ($loop->iteration <= 2)
                            @continue
                        @endif
                        @include('partials.address.transaction', ['transaction' => $transaction])
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        var color = $('#navbar-header').css('backgroundColor');
        $('.sparkline').sparkline('html', {
            type: 'line',
            lineColor: color,
            fillColor: shade(color, 40),
            highlightLineColor: color,
            lineWidth: 2,
            spotRadius: 0,
            width: '100%',
            height: '400px',
            tooltipPrefix: ' {{ $network }} ',
            tooltipSuffix: ' @ ',
            tooltipFormat: '@{{prefix}}@{{y}}@{{suffix}}@{{x}}',
            numberFormatter: function (v) {
                return v < 1000000000 ? v : moment.unix(v).format('ll');
            }
        });

        function shade(color, amount) {
            var regex = /rgb\((\d{1,3}), (\d{1,3}), (\d{1,3})\)/;
            var matches = regex.exec(color);
            var red = Math.min(255, parseInt(matches[1]*(1+amount/100)));
            var green = Math.min(255, parseInt(matches[2]*(1+amount/100)));
            var blue = Math.min(255, parseInt(matches[3]*(1+amount/100)));
            return 'rgb('+red+','+green+','+blue+')';
        }
    </script>
@endpush
