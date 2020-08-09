<header class="header-area">
        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="top-header-content d-flex align-items-center justify-content-between">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="{{ url('/') }}"><img src="{{ asset('asset/img/core-img/logo.png') }}" alt=""></a>
                            </div>

                            <!-- Login Search Area -->
                            <div class="login-search-area d-flex align-items-center">
                                <!-- Login -->
                                
                                <!-- Search Form -->
                                <div class="search-form">
                                    <form action="#" method="post">
                                        <input type="search" name="search" class="form-control" placeholder="Search">
                                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="newspaper-main-menu" id="stickyMenu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="newspaperNav">

                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html"><img src="{{ asset('asset/img/core-img/logo.png') }}" alt=""></a>
                        </div>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>
                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li class="active"><a href="{{ url('/') }}">Home</a></li>
                                    @foreach($the_loai as $value)
                                    <li><a href="#">{{ $value->ten }}</a>
                                        <ul class="dropdown">
                                            @foreach($value->loaitin  as $lt)
                                            <li><a href="{{ url('/')."/".$lt->ten_khong_dau }}" class="text-capitalize">{{ $lt->ten }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                    <li><a href="{{ url('/contact') }}">Contact</a></li>
                                    <li><a href="{{ url('/about') }}">About</a></li>
                                    <li class="ml-auto">
                                            @guest('member') 
                                                <li style="list-style: none; margin-left: 60px">
                                                    <a  class="btn btn-primary" href="{{ route('member.login') }}">{{ __('Login') }}</a>
                                                </li>
                                                {{-- @if (Route::has('member.register'))
                                                    <li style="list-style: none;">
                                                        <a class="btn btn-success" href="{{ route('member.register') }}">{{ __('Register') }}</a>
                                                    </li>
                                                @endif --}}
                                            @else 
                                                <li class="dropdown" style="list-style: none;  margin-left: 60px;">
                                                    <a  href="#" class="btn btn-danger" style="background-color: orange; color: white">
                                                       <i class="fa fa-user fa-fw"></i> {{ Auth::guard('member')->user()->name}} <span class="caret"></span>
                                                    </a>
                                                    <ul class="dropdown">
                                                        <li><a class=" text-dark" href="{{ url('member/profile/')."/".Auth::guard('member')->user()->id }}"><i class="fa fa-user fa-fw"></i>User Profile</a></li>
                                                        <li > <a style="height: 20px;" class="text-dark" href="{{ url('member/logout') }}"
                                                           onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                                                             <i class="fas fa-power-off"></i> Logout
                                                        </a></li>
                                                        <form id="logout-form" action="{{ url('member/logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    </ul>
                                                </li>
                                            @endguest
                                    </li>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>