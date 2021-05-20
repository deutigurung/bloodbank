<header class="continer-fluid ">
    <div class="header-top">
        <div class="container">
            <div class="row col-det">
                <div class="col-lg-6 d-none d-lg-block">
                    <ul class="ulleft">
                        <li>
                            <i class="far fa-envelope"></i>
                            info@cite.com
                            <span>|</span></li>
                        <li>
                            <i class="far fa-clock"></i>
                            Service Time : 12:AM</li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-12">
                    <ul class="ulright">
                        <li>
                            <a href="{{ route('login') }}"><i class="fas fa-user"></i>Login</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}"><i class="fas fa-user-plus"></i>Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="menu-jk" class="header-bottom scroll-to-fixed-fixed" style="z-index: 1000; /*position: fixed;*/ top: 0px; margin-left: 0px; width: 1349px; left: 0px;">
        <div class="container">
            <div class="row nav-row">
                <div class="col-md-3 logo">
                    <img src="{{ asset('assets/images/logo.jpg') }}" alt="">
                </div>
                <div class="col-md-9 nav-col">
                    <nav class="navbar navbar-expand-lg navbar-light">

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ url('/') }}">Home
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#about">About Us</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#gallery">Gallery</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#process">Process</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#blog">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#contact">Contact US</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
{{--    <div style="display: block; width: 1349px; height: 84px; float: none;"></div>--}}
</header>
