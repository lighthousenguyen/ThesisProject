@extends('layout')

@section('title')
    Trang cá nhân
@endsection

@section('pageCss')
    <link rel="stylesheet" href="{{asset('assets/css/profile.css')}}">
    @endsection
    @section('content')
            <!--=== Profile ===-->
    <div class="container content profile">
        <div class="row">
            <!--Left Sidebar-->
            <div class="col-md-3 md-margin-bottom-40">
                <img class="img-responsive profile-img margin-bottom-20 full-width" src="{{asset('assets/img/team/01.jpg')}}" alt="">

                <ul class="list-group sidebar-nav-v1 margin-bottom-40 " id="sidebar-nav-1">
                    <li class="list-group-item active">
                        <a data-toggle="tab" href="#profile"><i class="fa fa-user"></i> Thông tin</a>
                    </li>
                    <li class="list-group-item">
                        <a data-toggle="tab" href="#posted"><i class="fa fa-file-text-o"></i> Bài đã đăng</a>
                    </li>
                    <li class="list-group-item">
                        <a data-toggle="tab" href="#prescription"><i class="fa fa-list-alt"></i>Danh sách bài thuốc</a>
                    </li>
                    @if($isMe)
                    <li class="list-group-item">
                        <a data-toggle="tab" href="#notice"><i class="fa fa-comment"></i>Thông báo</a>
                    </li>
                    <li class="list-group-item">
                        <a data-toggle="tab" href="#changePassword"><i class="fa fa-key"></i>Đổi mật khẩu</a>
                    </li>
                    @endif
                </ul>
            </div>
            <!--End Left Sidebar-->

            <!-- Profile Content -->
            <div class="col-md-9">
                <div class="profile-body margin-bottom-20" >
                    <div class="tab-v1">
                        <div class="tab-content">
                            <div id="profile" class="profile-edit tab-pane fade in active">
                                <div class="panel panel-profile">
                                    <div class="panel-heading overflow-h">
                                        <h2 class="panel-title heading-sm pull-left"><i class="fa fa-user"></i>Thông tin cá nhân</h2>
                                    </div>
                                    <div class="panel-body margin-bottom-50">
                                        <dl class="dl-horizontal">
                                            <dt><strong>Tài Khoản: </strong></dt>
                                            <dd>{{$info->accountName}}</dd>
                                            <hr>
                                            <dt><strong>Email:</strong></dt>
                                            <dd>{{$info->email}}</dd>
                                            <hr>
                                            <dt><strong>Tên nhà thuốc:</strong></dt>
                                            <dd>{{$info->storename}}</dd>
                                            <hr>
                                            <dt><strong>Địa chỉ:</strong></dt>
                                            <dd>{{$info->address}}</dd>
                                            <hr>
                                            <dt><strong>Số điện thoại: </strong></dt>
                                            <dd>{{$info->phonenumber}}</dd>
                                            <hr>
                                            <dt><strong>Người đại diện </strong></dt>
                                            <dd>{{$info->representative}}</dd>
                                            <hr>
                                            <dt><strong>Ngày tham gia: </strong></dt>
                                            <dd>{{$info->created_at}}</dd>
                                            <hr>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                            <div id="posted" class="profile-edit tab-pane fade in ">
                                <div class="panel-body margin-bottom-50">
                                    <ul class="nav nav-justified nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#medicinal_plants">Cây thuốc</a></li>
                                        <li><a data-toggle="tab" href="#remedies">Bài thuốc</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="medicinal_plants" class="profile-edit tab-pane fade in active">
                                            @foreach($plantsPosted as $postedPlant)
                                                <div class="row">
                                                    <div class="easy-block-v1 col-md-2">
                                                        <img class="img-responsive" src="{{asset($postedPlant->thumbnailUrl)}}" alt="">
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="projects">
                                                            <h2><a class="color-dark" href="{{route('plant-detail',['id' => $postedPlant->id])}}">
                                                                    {{$postedPlant->commonName}}</a></h2>
                                                        </div>
                                                        <div class="project-share">
                                                            <ul class="list-inline comment-list-v2 pull-left">
                                                                <li><i class="fa fa-comments"></i> <a href="#">32</a></li>
                                                            </ul>
                                                            <ul class="list-inline star-vote pull-right">
                                                                <li><i class="color-green fa fa-star"></i></li>
                                                                <li><i class="color-green fa fa-star"></i></li>
                                                                <li><i class="color-green fa fa-star"></i></li>
                                                                <li><i class="color-green fa fa-star"></i></li>
                                                                <li><i class="color-green fa fa-star-o"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div id="remedies" class="profile-edit tab-pane fade in">
                                            @foreach($remediesPosted as $postedRemedy)
                                                <div class="row">
                                                    <div class="easy-block-v1 col-md-3">
                                                        <img class="img-responsive" src="{{asset($postedRemedy->thumbnailUrl)}}" alt="">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="projects">
                                                            <h2><a class="color-dark" href="{{route('remedy-detail',['id' => $postedRemedy->id])}}">
                                                                    {{$postedRemedy->title}}</a></h2>
                                                        </div>
                                                        <div class="project-share">
                                                            <ul class="list-inline comment-list-v2 pull-left">
                                                                <li><i class="fa fa-comments"></i> <a href="#">32</a></li>
                                                            </ul>
                                                            <ul class="list-inline star-vote pull-right">
                                                                <li><i class="color-green fa fa-star"></i></li>
                                                                <li><i class="color-green fa fa-star"></i></li>
                                                                <li><i class="color-green fa fa-star"></i></li>
                                                                <li><i class="color-green fa fa-star"></i></li>
                                                                <li><i class="color-green fa fa-star-o"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div id="prescription" class="profile-edit tab-pane fade in ">
                                <div class="panel panel-profile">
                                    <div class="panel-heading overflow-h">
                                        <h2 class="panel-title heading-sm pull-left"><i class="fa fa-th-list"></i>Danh mục bài thuốc</h2>
                                    </div>
                                    <div class="panel-body margin-bottom-50">
                                        <div class="media media-v2">
                                            @foreach ($prescription as $pre)
                                                <div class="row">
                                                    <div class="easy-block-v1 col-md-2">
                                                    <img class="img-responsive" src="{{asset($pre->remedyThumbnail)}}" alt="">
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="projects">
                                                            <h2><a class="color-dark" href="{{route('remedy-detail',['id' => $pre->remedyId])}}">
                                                                    {{$pre->remedyTitle}}</a></h2>
                                                        </div>
                                                        <div class="project-share">
                                                            <ul class="list-inline comment-list-v2 pull-left">
                                                                @if($isMe)
                                                                <li><button class="btn btn-default delete-prescription"
                                                                    data-remedy="{{$pre->remedyId}}" data-hsm="{{Session::get('credential')['attributes']['name']}}" type="button" title="Xóa khỏ danh sách">
                                                                        <i class="fa fa-trash-o"></i></button></li>
                                                                @endif
                                                            </ul>
                                                            <ul class="list-inline star-vote pull-right">
                                                                <li><i class="color-green fa fa-star"></i></li>
                                                                <li><i class="color-green fa fa-star"></i></li>
                                                                <li><i class="color-green fa fa-star"></i></li>
                                                                <li><i class="color-green fa fa-star"></i></li>
                                                                <li><i class="color-green fa fa-star-o"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div><!--/end media media v2-->
                                    </div>
                                </div>
                            </div>
                            @if($isMe)
                                <div id="notice" class="profile-edit tab-pane fade in ">
                                    <div class="panel panel-profile">
                                        <div class="panel-heading overflow-h">
                                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-comments"></i>Thông báo</h2>
                                        </div>
                                        <div class="panel-body margin-bottom-50">
                                            <div class="media media-v2">
                                                @foreach ($message as $msg)
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <strong><a href="#">{{$msg->from}}</a></strong>
                                                            <small>{{$msg->created_at}}</small>
                                                        </h4>
                                                        <p>{!! $msg->content !!}</p>
                                                    </div></br>
                                                @endforeach
                                            </div><!--/end media media v2-->
                                        </div>
                                    </div>
                                </div>
                                <div id="changePassword" class="profile-edit tab-pane fade in ">
                                    <form method="post" id="password-change" action="/changePassword" data-credential="{{$info->accountName}}">
                                        <div class="panel panel-profile">
                                            <div class="panel-heading overflow-h">
                                                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-user"></i>Đổi Mật Khẩu</h2>
                                            </div>
                                            <div class="panel-body margin-bottom-50">
                                                <dl class="dl-horizontal">
                                                    <dt><strong>Mật Khẩu cũ:</strong></dt>
                                                    <dd><input name="password" type="password" class="form-control"></dd>
                                                    <hr>
                                                    <dt><strong>Mật Khẩu mới: </strong></dt>
                                                    <dd><input name="newPassword" type="password" class="form-control"></dd>
                                                    <hr>
                                                    <dt><strong>Nhập lại mật khẩu: </strong></dt>
                                                    <dd><input name="newPassword_confirmation" type="password" class="form-control"></dd>
                                                    <hr>
                                                </dl>
                                                <button class="btn-u btn-u" type="submit">Lưu</button>
                                                <button class="btn-u btn-u-default" type="reset">Nhập lại</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Profile Content -->
        </div>
    </div>
    <!--=== End Profile ===-->
@endsection

@section('pageJS')
    <script>
        $('#password-change').on('submit', function(event){
            event.preventDefault();
            var credential = $(this).serializeJson();
            credential.credential = $(this).attr('data-credential');
            var $change = $.post($(this).attr('action'), credential)
            $change.then(function(response){
                if (response.status == 'error'){
                    var msg = '';
                    $.each(response.message, function(key, value){
                        msg += value + '\n';
                    });
                    alert (msg);
                }else if(response.status == 'OK'){
                    alert ('Đổi mật khẩu thành công');
                }
                $('.btn-u-default').click();
            });
        });

        $('.delete-prescription').on('click', function(){
            var data = {

            }
            var $change = $.ajax({
                method: "PUT",
                url: "/removePrescription",
                data: {id : $(this).attr('data-remedy')}
            });
            $change.then(function(response){
                alert (response.message)
//                    location.reload();
            })
        })
    </script>
@endsection