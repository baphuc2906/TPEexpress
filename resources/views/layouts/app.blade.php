<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- file login --}}
    <title>Admin</title>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href="{{ asset('admin_asset/styles.css') }}" rel="stylesheet" >
    {{-- <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script> --}}
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
</head>
<body>
   {{--  <div id="app"> --}}
      {{--   <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}
        <div id="wrapper" class="container-fluid" style="background-color: white;  ">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="{{ url('/') }}">SB Admin v2.0</a>
        </div>
        <!-- /.navbar-header-->
        <ul class="nav navbar-top-links navbar-right">
          <!-- /.dropdown-->
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-bell fa-fw"></i><i class="fa fa-caret-down"></i></a>
            <ul class="dropdown-menu dropdown-alerts">
              <li><a href="#">
                  <div><i class="fa fa-comment fa-fw"></i>
                    New Comment<span class="pull-right text-muted small">4 minutes ago</span>
                  </div></a></li>
              <li class="divider"></li>
              <li><a href="#">
                  <div><i class="fa fa-twitter fa-fw"></i>
                    3 New Followers<span class="pull-right text-muted small">12 minutes ago</span>
                  </div></a></li>
              <li class="divider"></li>
              <li><a href="#">
                  <div><i class="fa fa-envelope fa-fw"></i>
                    Message Sent<span class="pull-right text-muted small">4 minutes ago</span>
                  </div></a></li>
              <li class="divider"></li>
              <li><a href="#">
                  <div><i class="fa fa-tasks fa-fw"></i>
                    New Task<span class="pull-right text-muted small">4 minutes ago</span>
                  </div></a></li>
              <li class="divider"></li>
              <li><a href="#">
                  <div><i class="fa fa-upload fa-fw"></i>
                    Server Rebooted<span class="pull-right text-muted small">4 minutes ago</span>
                  </div></a></li>
              <li class="divider"></li>
              <li><a class="text-center" href="#"><strong>See All Alerts</strong><i class="fa fa-angle-right"></i></a></li>
            </ul>
            <!-- /.dropdown-alerts-->
          </li>
          <!-- /.dropdown-->
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user fa-fw"></i><i class="fa fa-caret-down"></i></a>
            <ul class="dropdown-menu dropdown-user">
              <li><a href="#"><i class="fa fa-user fa-fw"></i>
                  User Profile</a></li>
              <li><a href="#"><i class="fa fa-gear fa-fw"></i>
                  Settings</a></li>
              <li class="divider"></li>
              <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i>
                  Logout</a>
              </li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
            </ul>
            <!-- /.dropdown-user-->
          </li>
          <!-- /.dropdown-->
        </ul>
        <!-- /.navbar-top-links-->
        <div class="navbar-default sidebar" role="navigation">
          <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
              <li class="sidebar-search">
                <div class="input-group custom-search-form">
                  <input class="form-control" type="text" placeholder="Search..."/><span class="input-group-btn">
                    <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></span>
                </div>
                <!-- /input-group-->
              </li>
              <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard fa-fw"></i>
                  Dashboard</a></li>
              <li><a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-sitemap fa-fw"></i>
                  Thể Loại<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse "  id="collapseExample">
                  <li><a href="{{ url('/admin/theloai/danhsach')}}">Danh sách thể loại</a></li>
                  <li><a href="{{ url('/admin/theloai/them') }}">Thêm nội dung thể loại</a></li>
                </ul>
                <!-- /.nav-second-level-->
              </li>
              
              <li><a data-toggle="collapse" href="#collapse" aria-expanded="false" aria-controls="collapse"><i class="fa fa-sitemap fa-fw"></i>
                  Loại Tin<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse "  id="collapse">
                  <li><a href="{{ url('/admin/loaitin/danhsach')}}">Danh sách loại tin</a></li>
                  <li><a href="{{ url('/admin/loaitin/them')}}">Thêm nội dung loại tin</a></li>
                  </ul>
                <!-- /.nav-second-level-->
              </li>
              <li><a data-toggle="collapse" href="#collapseid" aria-expanded="false" aria-controls="collapseid"><i class="fa fa-sitemap fa-fw"></i>
                  Tin Tức<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse "  id="collapseid">
                  <li><a href="{{ url('/admin/tintuc/danhsach')}}">Danh sách tin tức</a></li>
                  <li><a href="{{ url('/admin/tintuc/them')}}">Thêm nội dung tin tức</a></li>
                  </ul>
                <!-- /.nav-second-level-->
              </li>
              <li><a data-toggle="collapse" href="#collapseido" aria-expanded="false" aria-controls="collapseido"><i class="fa fa-user fa-fw"></i>
                  Người dùng<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse "  id="collapseido">
                  <li><a href="{{ url('/admin/user/danhsach')}}">Danh sách người dùng</a></li>
                  </ul>
                <!-- /.nav-second-level-->
              </li>
              <li><a href="tables.html"><i class="fa fa-table fa-fw"></i>
                  Tables</a></li>
              <li><a href="{{ url('/admin/tintuc/them')}}"><i class="fa fa-edit fa-fw"></i>
                  Forms</a></li>
            </ul>
          </div>
          <!-- /.sidebar-collapse-->
        </div>
        <!-- /.navbar-static-side-->
      </nav>
        <main class="py-4">
            @yield('content')
           
        </main>
    </div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.2.0/metisMenu.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/timelinejs/2.36.0/js/timeline-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.4/raphael-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="{{ asset('admin_asset/main.js')}} " type="text/javascript" ></script>
    @yield('script')
</body>
</html>
