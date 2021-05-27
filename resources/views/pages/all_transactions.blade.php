@extends('layouts.app1')

@section('content')
<div class="exploreTwoStart">
    <div class="exploreTwoTop">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="exploreTwoLeft">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ asset(Helper::locale()) }}">
                                @if(Helper::network() == "LTC")
                                    Litecoin
                                @elseif(Helper::network() == "DOGE")
                                    Dogecoin
                                @else
                                    Bitcoin
                                @endif

                                explorer</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle">{{ __('messages.transaction') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="exploreTwoRight">
                        <div class="exploreTwoSearch">
                            <form action="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), '/search') }}">
                                <input type="hidden" name="currency" value="{{ Helper::network() }}">
                                <input class="form-control rounded-0" type="search" autocomplete="off" name="q" placeholder="{{ __('messages.search_placeholder') }}">
                                <button class="btn btn-light my-2 my-sm-0 rounded-0" type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blockTransition">
        <div class="container-fluid">
            <div class="blockTransitionBox">
                <div class="blockTransheading">
                    <div class="blockLeft">
                        <h2>All Transactions</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="transactionAll">
                            <div class="dataAllTrans">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">{{ __('messages.hash') }}</th>
                                                <th scope="col">{{ __('messages.time') }}</th>
                                                <th scope="col">{{ __('messages.amount') }} ({{ Helper::network() }})</th>
                                                <th scope="col">{{ __('messages.amount') }} ($)</th>
                                            </tr>
                                        </thead>
                                        <tbody id="all-transactions">
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="{{ asset('/js/all_transactions.js') }}"></script>
@endpush