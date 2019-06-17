@extends('admin/adminLayout')

@section('adminContent')
    <style>
        .pd-top-7{padding-top: 7px;}
        .mg-top-40{margin-top: -40px}
    </style>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h2>Quản lý người dùng</h2>
                    <button class="btn btn-primary pull-right mg-top-40" data-toggle="modal" data-target="#CredentialModal">Tạo tài khoản mới</button>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Tài khoản</th>
                        <th>Email</th>
                        <th>Vai trò</th>
                        <th>Trạng thái</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if($user->role == 'member')
                                Thành viên
                            @elseif($user->role == 'mod')
                                Quản trị nội dung
                            @else
                                Nhà thuốc
                            @endif
                        </td>
                        <td>
                            @if($user->status == 'active')
                                Hoạt động
                            @elseif($user->status == 'inactive')
                                Khóa
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-info detail-user" data-role="{{$user->role}}"
                               data-credential="{{$user->name}}" data-status="{{$user->status}}" >Chi tiết</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <!-- Modal -->
        <div id="storeInfoModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thông tin tài khoản nhà thuốc</h4>
                    </div>
                    <div class="modal-body">
                        <form id="registerForm" class="form-horizontal" role="form" method="POST" action="" novalidate="novalidate">

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Tài khoản</label>
                                <div class="col-sm-6 pd-top-7">
                                    <span id="store-accountName"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Email</label>

                                <div class="col-sm-6 pd-top-7">
                                    <span id="store-email"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Tên cửa hàng</label>

                                <div class="col-sm-6 pd-top-7">
                                    <span id="store-storename"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Địa chỉ</label>
                                <div class="col-sm-6 pd-top-7">
                                    <span id="store-address"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Số điện thoại</label>

                                <div class="col-sm-6 pd-top-7">
                                    <span id="store-phonenumber"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Người đại diện</label>

                                <div class="col-sm-6 pd-top-7">
                                    <span id="store-representative"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12 text-center">
                                    <input type="button" value="" class="btn" id="changeStatus">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- end Modal -->

        <!-- Modal member -->
        <div id="memberInfoModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thông tin tài khoản nhà thuốc</h4>
                    </div>
                    <div class="modal-body">
                        <form id="registerForm" class="form-horizontal" role="form" method="POST" action="" novalidate="novalidate">

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Tài khoản</label>
                                <div class="col-sm-6 pd-top-7">
                                    <span id="member-accountName"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Email</label>

                                <div class="col-sm-6 pd-top-7">
                                    <span id="member-email"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Tên</label>

                                <div class="col-sm-6 pd-top-7">
                                    <span id="member-firstName"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Họ</label>
                                <div class="col-sm-6 pd-top-7">
                                    <span id="member-lastName"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Ngày sinh</label>

                                <div class="col-sm-6 pd-top-7">
                                    <span id="member-DoB"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Vai trò</label>

                                <div class="col-sm-6 pd-top-7">
                                    <select id="member-role" class="form-control">
                                        <option value="mod">Quản trị nội dung</option>
                                        <option value="member">Thành viên</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12 text-center">
                                    <input type="button" value="Lưu" class="btn btn-success" id="changeRole">
                                    <input type="button" value="" class="btn btn-danger" id="memberStatus">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- end Modal member-->

        <div id="CredentialModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thông tin tài khoản</h4>
                    </div>
                    <div class="modal-body">
                        <form id="mod-create" action="/createMod" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Email</label>

                                <div class="col-sm-6 pd-top-7">
                                    <input name="email" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Tài khoản</label>

                                <div class="col-sm-6 pd-top-7">
                                    <input name="name" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Mật Khẩu</label>
                                <div class="col-sm-6 pd-top-7">
                                    <input name="password" class="form-control" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Xác nhận mật Khẩu</label>

                                <div class="col-sm-6 pd-top-7">
                                    <input name="password_confirmation" class="form-control" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class=" col-sm-12 text-center">
                                    <button class="btn btn-primary">Lưu</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection

@section('adminJS')
    <script>
        jQuery(document).ready(function() {
            $('.detail-user').on('click', function(){
                var $userInfo   = $.get('/userDetail?credential=' + $(this).attr('data-credential')
                        + '&role=' + $(this).attr('data-role'));
                $userInfo.then(function(response){
                    var data = JSON.parse(response);
                    if (data.role != 'store') {
                        if(data.status == 'active'){
                            $('#memberStatus').addClass('btn-danger').val('Khóa')
                            ;
                        }else{
                            $('#memberStatus').addClass('btn-primary').val('Mở khóa')
                            ;
                        }
                        $('#memberInfoModal').modal({
                            keyboard: true,
                            show: true
                        });
                        $.each(data, function (key, value) {
                            if(key != 'role')
                                $('#member-' + key).html(value);
                            else
                                $('#member-' + key).val(value);
                        });
                    } else {
                        if(data.status == 'active'){
                            $('#changeStatus').addClass('btn-danger').val('Khóa')
                            ;
                        }else{
                            $('#changeStatus').addClass('btn-primary').val('Mở khóa')
                            ;
                        }
                        $('#storeInfoModal').modal({
                            keyboard: true,
                            show: true
                        });
                        $.each(data, function (key, value) {
                            $('#store-' + key).html(value);
                        });
                    }
                });
            });

            $('#memberStatus').on('click', function(){
                var data = {accountName: $('#member-accountName').html()};
                proceedCredential('/changeStatus', data)
            });

            $('#changeStatus').on('click', function(){
                var data = {accountName: $('#store-accountName').html()};
                proceedCredential('/changeStatus', data)
            });

            $('#changeRole').on('click', function(){
                var data =
                {
                    accountName : $('#member-accountName').html(),
                    role        : $('#member-role').val()
                };
                proceedCredential('/changeRole', data);
            });

            $('#deny-btn').on('click', function(){

            });

            $('#mod-create').on('submit', function(){
                event.preventDefault();
                var registerInfo = $(this).serialize();
                var register = $.post($(this).attr('action'), registerInfo);
                register.then(function(response){
                    if (response.status != 'OK'){
                        var msg = '';
                        $.each(response.message, function(key, value){
                            msg += value + '\n';
                        });
                        alert (msg);
                    }else{
                        alert (response.message);
                        location.reload();
                    }
                });
            });
            function proceedCredential (url, data){
                var $proceed = $.ajax({
                    method  : "PUT",
                    url     : url,
                    data    : data
                });
                $proceed.then(function(response){
                    alert (response.message)
                    location.reload();
                });
            }

        });
    </script>
@endsection