<div class="mt-4">
    <div>
        <i class="fas fa-arrows-alt-h"></i>
        <a class="transaction-link" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), route('front.transaction', $transaction->txid)) }}">
            {{ $transaction->txid }}
        </a>
    </div>

    <div>
        <p class="float-left">
            <span class="badge badge-big badge-primary text-uppercase"><i class="fas fa-arrow-down"></i>
                {{ count($transaction->inputs) }} {{ __('messages.inputs') }}
            </span>
        </p>
        <p class="float-right">
            <span class="badge badge-big badge-primary text-uppercase">
               {{ count($transaction->outputs) }} {{ __('messages.outputs') }} <i
                        class="fas fa-arrow-up"></i>
            </span>
        </p>
    </div>

    <div class="clearfix"></div>

    <div>
        <h5 class="text-center">
            <strong>
                {{ $transaction->value }} {{ $network }}
            </strong>
            <span class="badge badge-big badge-{{ $transaction->is_incoming ? 'success' : 'danger' }} text-uppercase">{{ $transaction->is_incoming ? __('messages.received') : __('messages.sent') }}</span>
        </h5>
    </div>

    <div class="card-group">
        <div class="card">
            <div class="card-body">
                @if($transaction->inputs)
                    @foreach($transaction->inputs as $item)
                        <p class="card-text text-left">
                            <strong>{{ $transaction->value }} {{ $network }}</strong> <span class="text-uppercase">{{ __('messages.from') }}</span>
                            @if(wrong_address($item->address))
                                {{ __('messages.newly_generated_coins') }}
                            @else
                                <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), route('front.address', $item->address)) }}">
                                    {{ $item->address }}
                                </a><br/>
                            @endif
                        </p>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                @if($transaction->outputs)
                    @foreach($transaction->outputs as $item)
                        <p class="card-text text-right">
                            <strong>{!! $item->value !!} {{ $network }}</strong> <span class="text-uppercase">{{ __('messages.to') }}</span>
                            @if(wrong_address($item->address))
                                {{ __('messages.nonstandard') }}
                            @else
                                <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), route('front.address', $item->address)) }}">
                                    {{ $item->address }}
                                </a><br/>
                            @endif
                        </p>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>