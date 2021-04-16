@extends('layouts.app')

@section('title')
    {{ __('messages.error') }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>{{ __('messages.error') }}</h1>
                {{ $content or __('messages.object_not_found') }}
            </div>
        </div>
    </div>
@endsection