@extends('layouts.app')

@section('content')
<section id="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="boardRight">
                <div class="dashboardContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="dashboardHead">
                                <div class="welcome">
                                    <h2>Welcome, <span>James</span></h2>
                                </div>
                                <div class="notification">
                                    <ul>
                                        <li><a href="#"><small>02</small><i class="far fa-bell"></i></a></li>
                                        <li><a href="#"><span class="badge badge-pill badge-dark">Dk</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row dashInn">
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-lg-7 col-md-6 col-sm-12">
                                    <div class="dashBox">
                                        <div class="boardSwitch">
                                            <h5>Exchange</h5>
                                            <div class="switch">
                                                <input type="radio" id="radio01" name="radio" checked="checked"/>
                                                <label for="radio01">
                                                    <span class='gray-cyrcle'>
                                                        <span class='red-cyrcle'></span>
                                                    </span>
                                                    <span class='label-text'>Buy</span>
                                                </label>

                                                <input type="radio" id="radio02" name="radio" />
                                                <label for="radio02">
                                                    <span>
                                                        <span>Sell</span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="selectCountryOuter">
                                            <form>  
                                                <div class="form-group">
                                                    <label for="sendInput">I Send</label>
                                                    <div class="combineSelect">
                                                        <input type="text" class="form-control" id="sendInput" placeholder="100">
                                                        <div class="selectCountry">
                                                            <div class="select_wrap">
                                                                <ul class="default_option">
                                                                    <li>
                                                                        <div class="option pizza">
                                                                            <div class="icon1"></div>
                                                                            <p>USD</p>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <ul class="select_ul">
                                                                    <li>
                                                                        <div class="option pizza">
                                                                            <div class="icon1"></div>
                                                                            <p>USD</p>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="option burger">
                                                                            <div class="icon2"></div>
                                                                            <p>AZD</p>
                                                                        </div>  
                                                                    </li>
                                                                    <li>
                                                                        <div class="option ice">
                                                                            <div class="icon3"></div>
                                                                            <p>BOD</p>
                                                                        </div>  
                                                                    </li>
                                                                    <li>
                                                                        <div class="option fries">
                                                                            <div class="icon4"></div>
                                                                            <p>CUD</p>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="option fries">
                                                                            <div class="icon5"></div>
                                                                            <p>CUD</p>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="sendInput">I Receive</label>
                                                    <div class="combineSelect">
                                                        <input type="text" class="form-control" id="recieveInput" placeholder="0.0000100">
                                                        <div class="selectCountry">
                                                            <div class="receiveWrap">
                                                                <ul class="defaultOption">
                                                                    <li>
                                                                        <div class="option pizza">
                                                                            <div class="Bicon1"></div>
                                                                            <p>USD</p>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <ul class="selectBTC_ul">
                                                                    <li>
                                                                        <div class="option pizza">
                                                                            <div class="Bicon1"></div>
                                                                            <p>USD</p>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="option burger">
                                                                            <div class="Bicon2"></div>
                                                                            <p>AZD</p>
                                                                        </div>  
                                                                    </li>
                                                                    <li>
                                                                        <div class="option ice">
                                                                            <div class="Bicon3"></div>
                                                                            <p>BOD</p>
                                                                        </div>  
                                                                    </li>
                                                                    <li>
                                                                        <div class="option fries">
                                                                            <div class="Bicon4"></div>
                                                                            <p>CUD</p>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="option fries">
                                                                            <div class="Bicon4"></div>
                                                                            <p>CUD</p>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dashBtn">
                                                    <button type="button" class="btn">Continue</button>
                                                </div>   
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6 col-sm-12">
                                    <div class="dashProgress">
                                        <p>Level</p>
                                        <div class="progress blue"> 
                                            <span class="progress-left"> 
                                                <span class="progress-bar"></span> 
                                            </span> 
                                            <span class="progress-right"> 
                                                <span class="progress-bar"></span> 
                                            </span>
                                            <div class="progress-value">
                                                <span>1st</span>
                                                <span class="barlevel">Level</span>
                                            </div>
                                        </div>
                                        <div class="progTxt">
                                            <p><span>Level-up</span> to increase your limits</p>
                                        </div>
                                        <div class="barBtn">
                                            <button type="button" class="btn">Upgrade</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="boardAccount">
                                <h4>Account</h4>
                                <div class="accountSet">
                                    <div class="proPic">
                                        Dk
                                    </div>
                                    <div class="proText">
                                        <h3>James Carter</h3>
                                        <a href="mailto:hello@ortimd.com">hello@ortimd.com</a>
                                    </div>
                                </div>
                                <div class="boardform">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                        </div>
                                        <p>Confirm email address</p>
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                        </div>
                                        <p>Confirm phone number</p>
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend" id="button-addon3">
                                            <span class="input-group-text"><i class="far fa-user"></i></span>
                                            <button type="submit" class="btn">Verify Identity</button>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend" id="button-addon3">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            <button type="submit" class="btn">Set up 2FA</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="row">
                        <div class="col-lg-8 col-md-6 col-sm-12">
                            <div class="transBg">
                                <div class="noTransaction">
                                    <p>Transactions</p>
                                    <h4>No Transactions yet</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="dashBox transLimitOut">
                                <div class="transLimInn">
                                    <p>Transaction Limits</p>
                                </div>
                                <div class="transLimit">
                                    <div class="limitDaily">
                                        <span>Daily</span>
                                        <h5>$9,000 / %10,000</h5>
                                        <p>2/3 transactions</p>
                                    </div>
                                    <div class="limitDaily">
                                        <span>Month</span>
                                        <h5>$24,000 / %25,000</h5>
                                        <p>19/20 transactions</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="row">
                        <div class="col-lg-8 col-md-12">
                            <div class="transactionOuter">
                                <div class="transaction">
                                    <div class="transactionHead">
                                        <p>Recent Transactions</p>
                                        <div class="transSelect">
                                            <label>
                                                <select>
                                                    <option selected> All </option>
                                                    <option>Cancel</option>
                                                    <option>submit</option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="transactionInner">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="transBox">
                                                                <div class="transLeft">
                                                                    <button type="button" class="btn"><img src="{{ asset('images/transIcoin.png') }}" alt=""></button>
                                                                </div>
                                                                <div class="transRight">
                                                                    <h3>+ 0.00002897445 BTC</h3>
                                                                    <button type="button" class="btn success">Completed</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="transDate">
                                                                <h4>22 Apr 2021 - 00:45 AM</h4>
                                                                <p>Details</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="transBox">
                                                                <div class="transLeft">
                                                                    <button type="button" class="btn"><img src="{{ asset('images/transIcoin.png') }}" alt=""></button>
                                                                </div>
                                                                <div class="transRight">
                                                                    <h3>+ 0.00002897445 BTC</h3>
                                                                    <button type="button" class="btn warning">Completed</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="transDate">
                                                                <h4>22 Apr 2021 - 00:45 AM</h4>
                                                                <p>Details</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="transBox">
                                                                <div class="transLeft">
                                                                    <button type="button" class="btn"><img src="{{ asset('images/transIcoin.png') }}" alt=""></button>
                                                                </div>
                                                                <div class="transRight">
                                                                    <h3>+ 0.00002897445 BTC</h3>
                                                                    <button type="button" class="btn success">Completed</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="transDate">
                                                                <h4>22 Apr 2021 - 00:45 AM</h4>
                                                                <p>Details</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="transBox">
                                                                <div class="transLeft">
                                                                    <button type="button" class="btn"><img src="{{ asset('images/transIcoin.png') }}" alt=""></button>
                                                                </div>
                                                                <div class="transRight">
                                                                    <h3>+ 0.00002897445 BTC</h3>
                                                                    <button type="button" class="btn warning">Completed</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="transDate">
                                                                <h4>22 Apr 2021 - 00:45 AM</h4>
                                                                <p>Details</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="transBox">
                                                                <div class="transLeft">
                                                                    <button type="button" class="btn"><img src="{{ asset('images/transIcoin.png') }}" alt=""></button>
                                                                </div>
                                                                <div class="transRight">
                                                                    <h3>+ 0.00002897445 BTC</h3>
                                                                    <button type="button" class="btn success">Completed</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="transDate">
                                                                <h4>22 Apr 2021 - 00:45 AM</h4>
                                                                <p>Details</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="transAll">
                                            <a href="#">See all transactionss</a>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="dashBox transLimitOut">
                                <div class="transLimInn">
                                    <p>Transaction Limits</p>
                                </div>
                                <div class="transLimit">
                                    <div class="limitDaily">
                                        <span>Daily</span>
                                        <h5>$9,000 / %10,000</h5>
                                        <p>2/3 transactions</p>
                                    </div>
                                    <div class="limitDaily">
                                        <span>Month</span>
                                        <h5>$24,000 / %25,000</h5>
                                        <p>19/20 transactions</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script>
    $(document).ready(function(){
        $(".default_option").click(function(){
            $(this).parent().toggleClass("active");
        })

        $(".select_ul li").click(function(){
            var currentele = $(this).html();
            $(".default_option li").html(currentele);
            $(this).parents(".select_wrap").removeClass("active");
        })
    });
</script>

<script>
    $(document).ready(function(){
        $(".defaultOption").click(function(){
            $(this).parent().toggleClass("active");
        })

        $(".selectBTC_ul li").click(function(){
            var currentele = $(this).html();
            $(".defaultOption li").html(currentele);
            $(this).parents(".receiveWrap").removeClass("active");
        })
    });
</script>
@endpush
