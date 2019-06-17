@extends('admin/adminLayout')

@section('adminContent')
    <style>
        .pd-top-7{padding-top: 7px;}
    </style>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Danh sách nhà thuốc đăng ký mới</h1>

                    <div class="input-group custom-search-form" style="width:50%;">
                        <input type="text" class="form-control" placeholder="Search account and email ...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Tài khoản</th>
                            <th>Email</th>
                            <th>Ngày đăng ký</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($waiting as $store)
                        <tr>
                            <td>{{$store->name}}</td>
                            <td>{{$store->email}}</td>
                            <td>{{$store->created_at}}</td>
                            <td>
                                <a class="btn btn-info detail-store" data-credential="{{$store->name}}" >Chi tiết</a>
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
            <div id="storeModal" class="modal fade" role="dialog">
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
                                    <label class="col-sm-4 control-label"></label>

                                    <div class="col-sm-6 pd-top-7">
                                        <span id="store-email"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Email</label>

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
                                        <input type="button" value="Duyệt" class="btn btn-success" id="active-btn">
                                        <input type="button" value="Từ chối" class="btn btn-danger" id="deny-btn">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end Modal -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection

@section('adminJS')
    <script>
        jQuery(document).ready(function() {
            $('.detail-store').on('click', function(){
                var $storeInfo = $.get('/storeInfo?credential='+$(this).attr('data-credential'));
                $storeInfo.then(function(response){
                    var data = JSON.parse(response);
                    $('#storeModal').modal({
                        keyboard: true,
                        show:true
                    });
                    $.each(data, function(key, value) {
                        $('#store-'+key).html(value);
                    });
                });
            });

            $('#active-btn').on('click', function(){
                var $proceed = $.ajax({
                    method: "PUT",
                    url: "/approveRegister",
                    data: { accountName: $('#store-accountName').html() }
                })
                $proceed.then(function(response){
                    alert (response.message)
                    location.reload();
                });
            });

            $('#deny-btn').on('click', function(){

            });
        });
    </script>
@endsection