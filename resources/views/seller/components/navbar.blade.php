<!--! ================================================================ !-->
    <!--! [Start] Navigation Manu !-->
    <!--! ================================================================ !-->
    <nav class="nxl-navigation">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="{{ url('dashboard') }}" class="b-brand">
                    <!-- ========   change your logo hear   ============ -->
                    <img src="{{ asset('assets/img/logoinseaa.png') }}" width="120" height="70" alt="" class="logo logo-lg" />
                    <img src="{{ asset('assets/img/logoinseaa.png') }}" width="120" height="70" alt="" class="logo logo-sm" />
                </a>
            </div>
            <div class="navbar-content">
                <ul class="nxl-navbar">
                    <!-- Navigation Label -->
                    <li class="nxl-item nxl-caption">
                        <label>Navigation</label>
                    </li>

                    <!-- Dashboard -->
                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{ route('seller.dashboard') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-airplay"></i></span>
                            <span class="nxl-mtext">Dashboards</span>
                        </a>
                    </li>

                    <!-- Product -->
                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{ route('seller.products.index') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-box"></i></span>
                            <span class="nxl-mtext">Product Kamu</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--! ================================================================ !-->
    <!--! [End]  Navigation Manu !-->
    <!--! ================================================================ !-->
