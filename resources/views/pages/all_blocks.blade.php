@extends('layouts.app1')

@section('content')
<div class="exploreTwoStart">
    <div class="exploreTwoTop">
        <div class="container">
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
                                <a class="nav-link dropdown-toggle">Blocks</a>
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
        <div class="container">
            <div class="blockTransitionBox">
                <div class="blockTransheading">
                    <div class="blockLeft">
                        <h2>Blocks</h2>
                    </div>
                    <!-- <div class="blockRight d-none d-sm-block">
                        <nav aria-label="...">
                            <ul class="pagination pagination-lg">
                                <li class="page-item active" aria-current="page">
                                    <span class="page-link">1</span>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">
                                    <i class="fas fa-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="transactionAll">
                            <div class="dataAllTrans">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Height</th>
                                                <th scope="col">{{ __('messages.time') }}</th>
                                                <th scope="col">{{ __('messages.transaction') }}</th>
                                                <th scope="col">{{ __('messages.miner') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody id="all-blocks">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- <div class="blockTransheading border-0 pt-0">
                    <div class="blockRight pagiBottom">
                        <nav aria-label="...">
                            <ul class="pagination pagination-lg">
                                <li class="page-item active" aria-current="page">
                                    <span class="page-link">1</span>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">
                                    <i class="fas fa-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="{{ asset('/js/all_blocks.js') }}"></script>
@endpush