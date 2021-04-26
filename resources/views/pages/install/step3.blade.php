@extends('layouts.install')

@section('title')
    Completed
@endsection

@section('content')
    <div class="column">
        <p>Congratulations! Installation is completed and <b>{{ __('messages.app_name') }}</b> is now up and running.</p>
        <div class="ui hidden divider"></div>
        <a href="{{ route('front.index') }}" class="ui teal button" target="_blank">Home page</a>
        <a href="{{ route('login') }}" class="ui teal button" target="_blank">Backend</a>
    </div>
@endsection