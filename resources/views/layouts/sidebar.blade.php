<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <div class="brandLog">
            <a href="#"><img src="images/logodash.png" alt=""></a>
        </div>
        <div class="logosml">
            <a href="#"><img src="images/logoIcon.png" alt=""></a>
        </div>
    </div>
    <ul class="sidebar-nav">
        <div class="dashboardMenu">
            <div class="boardCategory">
                <p>Engine</p>
                <ul>
                    <li><a class="{{ \Request::segment(1) == 'dashboard' ? 'active' : ''}}" href="#"><i class="fas fa-border-all"></i> <span>Dashboard</span></a></li>
                    <li><a href="#"><i class="fas fa-external-link-alt"></i> <span>Buy</span></a></li>
                    <li><a href="#"><i class="fas fa-external-link-alt"></i> <span>Sell</span></a></li>
                </ul>
            </div>
            <div class="boardCategory">
                <p>Account</p>
                <ul>
                    <li><a href="#"><i class="fas fa-palette"></i> <span>Limits</span></a></li>
                    <li><a href="#"><i class="fas fa-retweet"></i> <span> Transactions</span></a></li>
                    <li><a href="#"><i class="fas fa-cog"></i> <span> Setting</span></a></li>
                    <li><a href="#"><i class="far fa-life-ring"></i> <span>Support</span></a></li>
                    <li><a href="{{ asset('logout') }}"><i class="fas fa-power-off"></i> <span> Log out</span></a></li>
                </ul>
            </div>
        </div>
    </ul>
</aside>