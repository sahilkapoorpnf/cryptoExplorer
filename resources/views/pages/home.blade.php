@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <h2>{{ __('messages.blocks_mined') }}</h2>
                <div class="block"></div>
                <div class="mt-4">
                    <a href="#" id="link-last-block" class="btn btn-outline-primary">
                        <i class="fas fa-cube"></i>
                        {{ __('messages.view_last_block') }}
                    </a>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <h2 class="text-center">{{ __('messages.latest_transactions') }}</h2>
                <table id="tbl-transactions" class="table table-bordere"></table>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('/public/js/home.js') }}"></script>
@endpush