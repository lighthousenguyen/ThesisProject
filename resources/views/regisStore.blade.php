
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Đăng ký tài khoản</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS -->
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Oleo+Script:400,700'>
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/register.css')}}">

</head>

<body>


<div class="register-container container">
    <div class="row register span6 col-md-offset-1 col-md-10">
        <form action="" method="post">
            <h2>Thông tin tài khoản nhà thuốc</h2>
            <div class="col-md-6">
                <label for="username">Tài khoản</label>
                <input type="text" class="register-input" id="username" name="username" placeholder="nhập tài khoản">
                <label for="email">Email</label>
                <input type="text" class="register-input" id="email" name="email" placeholder="nhập email...">
                <label for="password">Mật khẩu</label>
                <input type="password" class="register-input" id="password" name="password" placeholder="nhập mật khẩu...">
                <label for="confirm">Xác nhận mật khẩu</label>
                <input type="password" class="register-input" id="confirm" name="confirm" placeholder="Xác nhận mật khẩu...">
            </div>
            <div class="col-md-6">
                <label for="name">Tên nhà thuốc</label>
                <input class="register-input" type="text" id="name" name="name" placeholder="nhập tên nhà thuốc">
                <label for="username">Địa chỉ</label>
                <input type="text" class="register-input" id="address" name="address" placeholder="nhập Địa chỉ">
                <label for="email">Số điện thoại</label>
                <input type="text" class="register-input" id="phone" name="phone" placeholder="nhập số điện thoại...">
                <label for="confirm">Người đại diện</label>
                <input type="password" class="register-input" id="confirm" name="confirm" placeholder="tên người đại diện...">
            </div>

            <!-- <<button type="submit" class="btn btn-primary">Đăng ký</button> -->
            <button type="submit" class="btn btn-info">Đăng ký</button>
        </form>
    </div>
</div>

<!-- Javascript -->
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

</body>

</html>

