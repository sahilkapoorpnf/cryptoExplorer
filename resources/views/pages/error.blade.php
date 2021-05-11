@extends('layouts.app1')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>{{ __('messages.error') }}</h1>

                @if(isset($content))
                	{{ $content or __('messages.object_not_found') }}
                @else
                	{{ 'No data found.' }}
                @endif

            </div>
        </div>
    </div>
@endsection