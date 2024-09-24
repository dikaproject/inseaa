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
                        <a href="{{ url('dashboard') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-airplay"></i></span>
                            <span class="nxl-mtext">Dashboards</span>
                        </a>
                    </li>

                    <!-- Product -->
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-airplay"></i></span>
                            <span class="nxl-mtext">Product</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{ url('products') }}">Add Product</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="{{route('products.pending')}}">Product Pending</a></li>
                        </ul>
                    </li>

                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{ route('admin.sellers.index') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-user"></i></span>
                            <span class="nxl-mtext">Seller Management</span>
                        </a>
                    </li>

                    <!-- Slider -->
                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{ url('sliders') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-image"></i></span>
                            <span class="nxl-mtext">Slider</span>
                        </a>
                    </li>

                    <!-- Category -->
                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{ url('category') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-tag"></i></span>
                            <span class="nxl-mtext">Category</span>
                        </a>
                    </li>

                    <!-- Testimonial -->
                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{ url('testimonial') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-thumbs-up"></i></span>
                            <span class="nxl-mtext">Konten</span>
                        </a>
                    </li>

                    <!-- Blog -->
                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{ url('admin/blog') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-edit"></i></span>
                            <span class="nxl-mtext">Blog</span>
                        </a>
                    </li>

                    <!-- Media -->
                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{ url('admin/media') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-film"></i></span>
                            <span class="nxl-mtext">Media</span>
                        </a>
                    </li>

                    <!-- Contact -->
                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{ route('admin.contacts.index') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-mail"></i></span>
                            <span class="nxl-mtext">Contact</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--! ================================================================ !-->
    <!--! [End]  Navigation Manu !-->
    <!--! ================================================================ !-->
