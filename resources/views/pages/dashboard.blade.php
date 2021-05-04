@extends('layouts.app')

@section('content')
<!-- dashboard section start -->
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
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <div class="row">
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <div class="dashBox">
                                        <div class="boardSwitch">
                                            <h5>Exchange</h5>
                                            <label class="switch">
                                                <input type="checkbox">
                                                <span class="slider round">Sell</span>
                                            </label>
                                        </div>
                                        <form>  
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">I Send</label>
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <option selected> <img src="images/logo.png"> 100</option>
                                                    <option>150</option>
                                                    <option>250</option>
                                                    <option>400</option>
                                                    <option>550</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">I Receive</label>
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <small>USD</small>
                                                    <option selected>100</option>
                                                    <option>150</option>
                                                    <option>250</option>
                                                    <option>400</option>
                                                    <option>550</option>
                                                </select>
                                            </div>
                                            <div class="dashBtn">
                                                <button type="button" class="btn">Continue</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12">
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
                                <div class="col-12">
                                    <div class="transBg">
                                        <div class="transaction">
                                            <p>Transactions</p>
                                            <h4>No Transactions yet</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
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
                                        <input type="text" class="form-control" id="confirmInput" aria-describedby="confirmInput" placeholder="Confirm email address">
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="confirmInput" aria-describedby="confirmInput" placeholder="Confirm phone number">
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
                </div>
            </div>
        </div>
    </div>
</section>
<!-- dashboard section xxit -->
@endsection
