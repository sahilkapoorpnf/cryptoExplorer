@extends('layouts.app')

@section('title')
    {{ __('pages.about') }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>{{ __('pages.about') }}</h1>
                <div class="card">
                    <div class="card-body">
                        <p>{{ __('pages.about_p', ['network' => Helper::network()]) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection