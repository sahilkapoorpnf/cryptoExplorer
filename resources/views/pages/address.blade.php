@extends('layouts.app1')

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
                            <p class="card-text text-center">{{ $data->received_value }} {{ Helper::network() }}</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center text-uppercase">{{ __('messages.pending') }}</h4>
                            <p class="card-text text-center">{{ $data->pending_value }} {{ Helper::network() }}</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center text-uppercase">{{ __('messages.balance') }}</h4>
                            <p class="card-text text-center">{{ $data->balance }} {{ Helper::network() }}</p>
                        </div>
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

