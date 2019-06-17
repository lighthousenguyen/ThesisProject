<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/metisMenu/dist/metisMenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/sb-admin-2.css')}}">

</head>

<body>
    <div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('adminHome')}}">Quản trị kỹ thuật</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li>
                <a href="{{route('managementLogout')}}"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
            </li>
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <h3>&nbsp;&nbsp;&nbsp;Danh mục</h3>
                    </li>
                    <li>
                        <a href="{{route('adminHome')}}"><i class="fa fa-dashboard fa-fw"></i> Thống kê</a>
                    </li>
                    <li>
                        <a href="{{route('admin.all-user')}}"><i class="fa fa-users fa-fw"></i> Quản lý người dùng</a>
                    </li>
                    <li>
                        <a href="{{route('admin.waitingStore')}}"><i class="fa fa-hospital-o fa-fw"></i> Nhà thuốc đăng ký mới</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
    @yield('adminContent')

    <!-- /.row -->
</div>
    <!-- /#page-wrapper -->

    <script src={{asset('assets/plugins/jquery/jquery.min.js')}}></script>

    <!-- Bootstrap Core JavaScript -->
    <script src={{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src={{asset('assets/plugins/metisMenu/dist/metisMenu.min.js')}}></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('assets/js/sb-admin-2.js')}}"></script>

    @yield('adminJS')
</body>

</html>