@extends('layouts.app')

@section('title')
    {{ __('messages.transaction') }} {{ $data->txid }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>{{ __('messages.transaction') }}</h1>
                <h4 class="text-secondary">{{ $data->txid }}</h4>

                @if($data->block_no)
                    <div>
                        <i class="fas fa-cube"></i>
                        <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), route('front.block', $data->block_no)) }}">{{ $data->block_no }}</a>
                        /
                        <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), route('front.block', $data->block_no)) }}" class="block-hash-link">{{ $data->blockhash }}</a>
                    </div>
                @endif

                <div class="clearfix"></div>

                <div class="card-group mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center text-uppercase">{{ __('messages.amount') }}</h4>
                            <p class="card-text text-center">{{ $data->sent_value }} {{ $network }}</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center text-uppercase">{{ __('messages.fees') }}</h4>
                            <p class="card-text text-center">{{ $data->fee }} {{ $network }}</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center text-uppercase">{{ __('messages.sent') }}</h4>
                            <p class="card-text text-center">{{ \Carbon\Carbon::createFromTimestampUTC($data->time)->diffForHumans() }}</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center text-uppercase">{{ __('messages.confirmations') }}</h4>
                            <p class="card-text text-center">{{ $data->confirmations }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <div>
                        <p class="float-left">
                                <span class="badge badge-big badge-primary text-uppercase"><i class="fas fa-arrow-down"></i>
                                    {{ count($data->inputs) }} {{ __('messages.inputs') }}
                                </span>
                        </p>
                        <p class="float-right">
                                <span class="badge badge-big badge-primary text-uppercase">
                                   {{ count($data->outputs) }} {{ __('messages.outputs') }} <i
                                            class="fas fa-arrow-up"></i>
                                </span>
                        </p>
                    </div>

                    <div class="clearfix"></div>

                    <div class="card-group">
                        <div class="card">
                            <div class="card-body">
                                @foreach($data->inputs as $item)
                                    <p class="card-text text-left">
                                        <strong>{!! $item->value !!}</strong> {{ $network }} <span class="text-uppercase">{{ __('messages.from') }}</span>
                                        @if(empty($item->received_from))
                                            {{ __('messages.newly_generated_coins') }}
                                        @else
                                            <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), route('front.address', $item->address)) }}">{{ $item->address }}</a>
                                        @endif
                                    </p>
                                @endforeach
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                @foreach($data->outputs as $item)
                                    <p class="card-text text-right">
                                        <strong>{!! $item->value !!} {{ $network }}</strong> <span class="text-uppercase">{{ __('messages.to') }}</span>
                                        @if(wrong_address($item->address))
                                            {{ __('messages.nonstandard') }}
                                        @else
                                            <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), route('front.address', $item->address)) }}">{{ $item->address }}</a>
                                        @endif
                                    </p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
