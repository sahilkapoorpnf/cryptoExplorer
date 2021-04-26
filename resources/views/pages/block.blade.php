@extends('layouts.app')

@section('title')
    {{ __('messages.block') }} {{ $data->block_no }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>{{ __('messages.block') }}</h1>
                <h4 class="text-secondary">{{ $data->block_no }} / {{ $data->blockhash }}</h4>

                <div>
                    <p class="float-left">
                        <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), route('front.block', $data->previous_blockhash)) }}">
                            <i class="fas fa-arrow-left"></i> {{ __('messages.previous_block') }} {{ $data->block_no - 1 }}
                        </a>
                    </p>
                    @if($data->next_blockhash !== null)
                        <p class="float-right">
                            <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), route('front.block', $data->next_blockhash)) }}">
                                {{ __('messages.next_block') }} {{ $data->block_no + 1 }} <i
                                        class="fas fa-arrow-right"></i>
                            </a>
                        </p>
                    @endif
                </div>

                <div class="clearfix"></div>

                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center text-uppercase">{{ __('messages.amount') }}</h4>
                            <p class="card-text text-center">{{ $data->sent_value }} {{ Helper::network() }}</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center text-uppercase">{{ __('messages.fees') }}</h4>
                            <p class="card-text text-center">{{ $data->fee }} {{ Helper::network() }}</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center text-uppercase">{{ __('messages.mined') }}</h4>
                            <p class="card-text text-center">{{ \Carbon\Carbon::createFromTimestampUTC($data->time)->diffForHumans() }}</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center text-uppercase">{{ __('messages.miner') }}</h4>
                            <p class="card-text text-center">{{ $data->miner }}</p>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button class="btn btn-outline-primary" type="button"
                            data-toggle="collapse" data-target="#tblInfo"
                            aria-expanded="false" aria-controls="tblInfo">
                        <i class="fas fa-angle-down"></i> {{ __('messages.more_details') }}
                    </button>
                </div>
                <div class="collapse mt-4" id="tblInfo">
                    <table id="tbl-block-extra-details" class="table table-striped">
                        <col span="1" width="20%">
                        <col span="1">
                        <tbody>
                        <tr>
                            <td>{{ __('messages.confirmations') }}</td>
                            <td>{{ $data->confirmations }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('messages.version') }}</td>
                            <td>{{ $data->version }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('messages.mining_difficulty') }}</td>
                            <td>{{ $data->mining_difficulty }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('messages.nonce') }}</td>
                            <td>{{ $data->nonce }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('messages.bits') }}</td>
                            <td>{{ $data->bits }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('messages.size') }}</td>
                            <td>{{ $data->size }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('messages.merkleroot') }}</td>
                            <td>{{ $data->merkleroot }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <h2 class="mt-5">{{ __('messages.transactions') }} ({{ count($data->txs) }})</h2>

                @foreach($data->txs as $transaction)
                    @if ($loop->iteration > 2)
                        @break
                    @endif
                    @include('partials.block.transaction', ['transaction' => $transaction])
                @endforeach

                @if(count($data->txs) > 2)
                <div class="text-center mt-4">
                    <button class="btn btn-outline-primary js-hide-container" type="button"
                            data-toggle="collapse" data-target="#tblTransactions"
                            aria-expanded="false" aria-controls="tblTransactions">
                        <i class="fas fa-angle-down"></i> {{ __('messages.load_more_transactions') }}
                    </button>
                </div>
                @endif

                <div class="collapse mt-4" id="tblTransactions">
                    @foreach($data->txs as $transaction)
                        @if ($loop->iteration <= 2)
                            @continue
                        @endif
                        @include('partials.block.transaction', ['transaction' => $transaction])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
