<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Content management</title>
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/metisMenu/dist/metisMenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/sb-admin-2.css')}}">
    @yield('modCSS')
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
            <a class="navbar-brand" href="{{route('modHome')}}">Quản trị nội dung</a>
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
                        <a href="{{route('modHome')}}"><i class="fa fa-dashboard fa-fw"></i> Thống kê</a>
                    </li>
                    <li>
                        <a href="{{route('plantManagement')}}"><i class="fa fa-pagelines fa-fw"></i> Quản lý Cây thuốc</a>
                    </li>
                    <li>
                        <a href="{{route('remedyManagement')}}"><i class="fa fa-list-alt fa-fw"></i> Quản lý bài thuốc</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
    @yield('modContent')

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
@yield('modJS')
</body>

</html>