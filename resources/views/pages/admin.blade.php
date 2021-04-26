@extends('layouts.app')

@section('title')
    {{ __('admin.admin_area') }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <h1>{{ __('admin.settings') }}</h1>
                <form method="post" action="{{ route('admin.update') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="show_transactions">{{ __('admin.transactions_number') }}</label>
                        <input type="number" class="form-control" name="show_transactions" id="show_transactions"
                               required
                               value="{{ old('show_transactions', config('settings.main.show_transactions')) }}"
                               placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="language">{{ __('admin.default_language') }}</label>
                        <select class="form-control" name="language" id="language">
                            @foreach($langs as $lang)
                                <option {{ $lang == config('settings.language') ? 'selected': '' }} value="{{ $lang }}">
                                    {{ __('language.' . $lang) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="language">{{ __('admin.color_scheme') }}</label>
                        <select class="form-control" name="color_scheme">
                            @foreach($colors as $color)
                                <option {{ $color == config('settings.color_scheme') ? 'selected': '' }} value="{{ $color }}">
                                    {{ ucfirst($color) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="logo" class="w-100">
                            {{ __('admin.logo') }}
                            @if(config('settings.logo'))
                                <a href="{{ route('admin.logo.delete') }}" class="btn btn-danger btn-sm float-right">
                                    <i class="fas fa-trash"></i>
                                </a>
                            @endif
                        </label>
                        <input type="file" class="form-control" name="logo" id="logo" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="client_id">{{ __('admin.adsense_client_id') }}</label>
                        <input type="text" class="form-control" name="client_id" id="client_id"
                               value="{{ old('client_id', config('settings.adsense.client_id')) }}" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="block1_id">{{ __('admin.adsense_block_top') }}</label>
                        <input type="text" class="form-control" name="block1_id" id="block1_id"
                               value="{{ old('block1_id', config('settings.adsense.block1_id')) }}" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="block2_id">{{ __('admin.adsense_block_bottom') }}</label>
                        <input type="text" class="form-control" name="block2_id" id="block2_id"
                               value="{{ old('block2_id', config('settings.adsense.block2_id')) }}" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="cache_address">{{ __('admin.address_page_cache_time') }}</label>
                        <input type="number" class="form-control" name="cache_address" id="cache_address" required
                               value="{{ old('cache_address', config('settings.cache.address')) }}" placeholder="">
                        <small class="form-text text-muted">{{ __('admin.in_minutes') }}</small>
                    </div>

                    <div class="form-group">
                        <label for="cache_block">{{ __('admin.block_page_cache_time') }}</label>
                        <input type="number" class="form-control" name="cache_block" id="cache_block" required
                               value="{{ old('cache_block', config('settings.cache.block')) }}" placeholder="">
                        <small class="form-text text-muted">{{ __('admin.in_minutes') }}</small>
                    </div>

                    <div class="form-group">
                        <label for="cache_transaction">{{ __('admin.transaction_page_cache_time') }}</label>
                        <input type="number" class="form-control" name="cache_transaction" id="cache_transaction"
                               required
                               value="{{ old('cache_transaction', config('settings.cache.transaction')) }}"
                               placeholder="">
                        <small class="form-text text-muted">{{ __('admin.in_minutes') }}</small>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection