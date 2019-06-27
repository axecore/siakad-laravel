<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('AdminLTE') }}/logo1-1.ico">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/dist/css/AdminLTE.min.css">
    <!-- pace -->
    <script src="{{ asset('AdminLTE') }}/bower_components/PACE/pace.js" charset="utf-8"></script>
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/bower_components/PACE/themes/silver/pace-theme-flash.css">
    <!-- dataTables css -->
    <link rel="stylesheet" href="{{ asset('css/dataTablesBootstrap.css') }}" type="text/css">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/dist/css/skins/skin-blue-light.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue-light sidebar-mini">
    <div class="wrapper">

        <header class="main-header">

            <!-- Logo -->
            <a href="/" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>AL</b>DI</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg text-light">Kampusku</span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav"></ul>
                </div>

            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="text-center image">
                        <img src="{{ asset('AdminLTE') }}/logo1.png" class="img-fluid" alt="User Image">
                    </div>
                </div>

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">NAVIGASI UTAMA</li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user"></i> <span>{{ Auth::user()->name }}</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="#" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off"></i>Logout</a></li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </ul>
                    </li>
                    <li class="treeview active">
                        <a href="#">
                            <i class="fa fa-bars"></i> <span>Menu</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">

                            <li class="{{ set_active('home') }}"><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>

                            <li class="
                            {{ set_active('matakuliah.index') }} 
                            {{ set_active('matakuliah.create') }} 
                            {{ set_active('matakuliah.edit') }}
                            {{ set_active('matakuliah.trash') }} "><a href="{{ route('matakuliah.index') }}"><i class="ion ion-ios-book"></i>Matakuliah</a></li>

                            <li class="
                            {{ set_active('dosen.index') }} 
                            {{ set_active('dosen.create') }} 
                            {{ set_active('dosen.edit')}} 
                            {{ set_active('dosen.trash') }}"><a href="{{ route('dosen.index') }}"><i class="ion ion-android-contacts"></i>Dosen</a></li>

                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-gear"></i> <span>Tes</span></a></li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">

            </div>
            <strong>M.AldiRenaldy 2019</strong>
        </footer>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="{{ asset('AdminLTE') }}/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <!-- FastClick -->
    <script src="{{ asset('AdminLTE') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE') }}/dist/js/adminlte.min.js"></script>
    <!-- Sparkline -->
    <script src="{{ asset('AdminLTE') }}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('AdminLTE') }}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS -->
    <script src="{{ asset('AdminLTE') }}/bower_components/chart.js/Chart.js"></script>
    {{-- <script src="{{ asset('AdminLTE') }}/dist/js/pages/dashboard2.js"></script> --}}
    {{-- <script src="{{ asset('AdminLTE') }}/dist/js/demo.js"></script> --}}

    <!-- DataTables -->
    <script src="{{ asset('js/jquery.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/jquery-dataTables.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}" charset="utf-8"></script>

    <!-- App scripts -->
    @stack('scripts')


</body>

</html>
