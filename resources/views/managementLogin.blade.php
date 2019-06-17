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
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <style>
                    .form-group{
                        padding:0;
                    }
                </style>
                <div class="panel-body">
                    <form role="form" method="post" action="/managementLogin">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Tài khoản" name="username" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Mật khẩu" name="password" type="password">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Ghi nhớ
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button class="btn btn-lg btn-success btn-block" type="submit">Đăng nhập</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#page-wrapper -->

<script src={{asset('assets/plugins/jquery/jquery.min.js')}}></script>

<!-- Bootstrap Core JavaScript -->
<script src={{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}></script>

<!-- Metis Menu Plugin JavaScript -->
<script src={{asset('assets/plugins/metisMenu/dist/metisMenu.min.js')}}></script>

<!-- Custom Theme JavaScript -->
<script src="{{asset('assets/js/sb-admin-2.js')}}"></script>
</body>