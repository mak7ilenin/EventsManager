<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard panel</title>

    <!-- Bootstrap -->
    <link href='{{ asset('components/bootstrap/dist/css/bootstrap.min.css') }}' rel="stylesheet">

    <link href='{{ asset('components/js/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}'
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href='{{ asset('components/css/font-awesome/css/font-awesome.min.css') }}' rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href='{{ asset('components/css/custom.min.css') }}' rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{ url('/dashboard') }}" class="site_title"><i class="fa fa-paw"></i>
                            <span>Dashboard panel</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src='{{ asset('components/images/user.png') }}' alt="..."
                                class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <h2>Welcome,{{ Auth::user()->name }}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                @if (Gate::allows('isAdmin') || Gate::allows('isManager'))
                                    <li><a><i class="fa fa-home"></i> Events Manage </a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ url('/eventlist') }}">Events List</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-list"></i> Registration list Manage </a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ url('/registerlist') }}">Registration list</a></li>
                                        </ul>
                                    </li>
                                @endif
                                @if (Gate::allows('isAdmin'))
                                    <li><a><i class="fa fa-users"></i> Users Manage</a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ url('/users') }}">Users List</a></li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                            <div class="mx-2 mt-3">
                                <a href="/" class="btn btn-outline-secondary w-100">Back to the events</a>
                            </div>
                        </div>
                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="/login">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src='{{ asset('components/images/user.png') }}'
                                        alt="">{{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/profile/' . Auth::user()->id) }}">
                                        Profile</a>

                                    <a class="dropdown-item" href="{{ url('/logout') }}">
                                        <i class="fa fa-sign-out pull-right"></i> Log Out
                                    </a>
                                </div>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">



                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="dashboard_graph x_panel">
                            <div class="col-md-6">
                                <h3>Admin panel</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <!------------------CONTENT--------------------->
                <div class="row">
                    <div class="col-md-12 col-sm-6 ">
                        <div class="x_panel fixed_height_320">

                            @yield('content')

                        </div>
                    </div>
                </div>
                <!------------------ end CONTENT--------------------->

            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                &copy; 2023 IVKHK
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
    </div>

    <!-- jQuery -->
    <script src='{{ asset('components/js/dist/jquery.min.js') }}'></script>
    <!-- Bootstrap -->
    <script src='{{ asset('components/bootstrap/dist/js/bootstrap.bundle.min.js') }}'></script>
    <script src='{{ asset('components/js/bootstrap-progressbar/bootstrap-progressbar.min.js') }}'></script>
    <!-- Custom Theme Scripts -->
    <script src='{{ asset('components/js/custom.min.js') }}'></script>
</body>

</html>
