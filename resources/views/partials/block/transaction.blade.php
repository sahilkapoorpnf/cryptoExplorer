<div class="mt-4">
    <div><i class="fas fa-arrows-alt-h"></i>
        <a class="transaction-link" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), route('front.transaction', $transaction->txid)) }}">{{ $transaction->txid }}</a>
    </div>
    <div>
        <p class="float-left">
            <span class="badge badge-big badge-primary text-uppercase">
                <i class="fas fa-arrow-down"></i> {{ count($transaction->inputs) }} {{ __('messages.inputs') }}
            </span>
        </p>
        <p class="float-right">
            <span class="badge badge-big badge-primary text-uppercase">
               {{ count($transaction->outputs) }} {{ __('messages.outputs') }} <i class="fas fa-arrow-up"></i>
            </span>
        </p>
    </div>

    <div class="clearfix"></div>

    <div>
        <h5 class="text-center text-uppercase">
            {{ __('messages.total') }} <strong>{{ collect($transaction->inputs)->sum('value') }} {{ $network }}</strong>
            ({{ __('messages.fee') }} <strong>{{ $transaction->fee }} {{ $network }}</strong>)
        </h5>
    </div>

    <div class="card-group">
        <div class="card">
            <div class="card-body">
                @foreach($transaction->inputs as $item)
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
                @foreach($transaction->outputs as $item)
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