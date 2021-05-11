@extends('layouts.app1')

@section('content')
<div class="col-md-12">
    <div class="exploreBitRight">
        <div class="bitRightTop">
            <h2>All blocks</h2>
        </div>
        <div class="bitRightData">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('messages.hash') }}</th>
                            <th scope="col">{{ __('messages.time') }}</th>
                            <th scope="col">{{ __('messages.amount') }}</th>
                        </tr>
                    </thead>
                    <tbody id="all-blocks">
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="{{ asset('/js/all_blocks.js') }}"></script>
@endpush