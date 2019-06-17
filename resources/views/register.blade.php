@extends('layout')

@section('title')
    Đăng ký tài khoản
@endsection
@section('pageCss')
    <link rel="stylesheet" href="{{asset('assets/css/pages/log-reg-v3.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-datepicker-1.5.1-dist/css/bootstrap-datepicker3.min.css')}}">

@endsection
@section('content')
    <!--=== Registre ===-->
    <div class="log-reg-v3 content-md margin-bottom-30">
        <div class="container">
            <div class="row">
                <div class="col-md-7 md-margin-bottom-50">
                    <h2 class="welcome-title">Chào mừng gia nhập VMN</h2>
                    <h3 class="welcome-title">Nơi chia sẻ thông tin về</h3>
                    <div class="info-block-v2">
                        <i class="fa fa-pagelines"></i>
                        <div class="info-block-in">
                            <h3>Cây thuốc Nam</h3>
                            <p>Nhiều cây thuốc nam quen thuộc, dễ tìm, dễ sử dụng và có hiệu quả chữa bệnh</p>
                        </div>
                    </div>
                    <div class="info-block-v2">
                        <i class="icon icon-layers"></i>
                        <div class="info-block-in">
                            <h3>Bài thuốc dân gian</h3>
                            <p>Nhiều bài thuốc, mẹo chữa bệnh hay được đóng góp bởi các thầy thuốc, nhà thuốc đông y và cộng đồng</p>
                        </div>
                    </div>
                    <div class="info-block-v2">
                        <i class="fa fa-h-square"></i>
                        <div class="info-block-in">
                            <h3>Nhà thuốc Đông Y</h3>
                            <p>Các nhà thuốc đông y uy tín  tham gia xây dựng và phát triển cộng đồng</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <form id="registerForm" class="log-reg-block sky-form" action="/memberRegister" method="post">
                        <h2>Đăng ký tài khoản</h2>

                        <div class="login-input reg-input">
                            <div class="row">
                                <div class="col-sm-6">
                                    <section>
                                        <label class="input">
                                            <input type="text" name="firstname" placeholder="Tên" class="form-control">
                                        </label>
                                    </section>
                                </div>
                                <div class="col-sm-6">
                                    <section>
                                        <label class="input">
                                            <input type="text" name="lastname" placeholder="Họ" class="form-control">
                                        </label>
                                    </section>
                                </div>
                            </div>
                            <label class="select margin-bottom-15">
                                <select name="gender" class="form-control">
                                    <option value="0" selected disabled>Giới tính</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                    <option value="Khác">Khác</option>
                                </select>
                            </label>
                            <section>
                                <label class="input">
                                    <input type="text" name="DoB" onkeydown="return false" placeholder="Ngày sinh" class="form-control">
                                </label>
                            </section>
                            <section>
                                <label class="input">
                                    <input type="text" name="name" placeholder="Tên đăng nhập" class="form-control">
                                </label>
                            </section>
                            <section>
                                <label class="input">
                                    <input type="text" name="email" placeholder="Email" class="form-control">
                                </label>
                            </section>
                            <section>
                                <label class="input">
                                    <input type="password" name="password" placeholder="Mật khẩu" id="password" class="form-control">
                                </label>
                            </section>
                            <section>
                                <label class="input">
                                    <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu" class="form-control">
                                </label>
                            </section>
                        </div>
                        <button class="btn-u btn-u-sea-shop btn-block margin-bottom-20 margin-top-20" type="submit">Tạo tài khoản</button>
                    </form>

                    <p class="text-center"><a href="{{route('register-store')}}" class="margin-bottom-20">Đăng ký nhà thuốc</a></p>
                    <p class="text-center">Bạn đã có tài khoản? <a href="{{route('login')}}">Đăng Nhập</a></p>
                </div>
            </div><!--/end row-->
        </div><!--/end container-->
    </div>
    <!--=== End Registre ===-->
@endsection

@section('pageJS')
    <script src="{{asset('assets/js/plugins/serializeJson.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-datepicker-1.5.1-dist/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-datepicker-1.5.1-dist/locales/bootstrap-datepicker.vi.min.js')}}"></script>

    <script>
        jQuery(document).ready(function() {
            App.init();
            App.initScrollBar();
            OwlCarousel.initOwlCarousel();
            $('[name=DoB]').datepicker({
                autoclose: true,
                language: 'vi',
                todayHighlight: true,

            });
            $('#registerForm').on('submit', function(event){
                event.preventDefault();
                var registerInfo = $(this).serializeJson();
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
                        window.location.href = $('#logIn').attr('href');
                    }
                });
            });

        });
    </script>
@endsection