@extends('layout')
@section('title')
    Đóng góp cây thuốc
@endsection
@section('pageCss')

    <link rel="stylesheet" href="{{asset('assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/master-slider/masterslider/style/masterslider.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/master-slider/masterslider/skins/default/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/dropzone/dist/dropzone.css')}}">
    @endsection

@section('content')

<!--=== Shop Product ===-->
<div class="shop-product content">

    <div class="container">
        <div class="row">
            <div class="col-md-6 md-margin-bottom-50">
                <div class="ms-showcase2-template">
                    <form action="/index.php/upload"
                         class="dropzone"
                          id="image-dropzone">
                    </form>
                </div>
            </div>

            <div class="col-md-6">
                <div class="shop-product-heading">
                    <h2>Nhập thông tin cây thuốc</h2>
                </div>
                <p>Những thông tin có đánh dấu <span class="text-danger">*</span> là bắt buộc nhập.</p>
                <form id="plant-adding-form" action="/contributePlants" method="post">
                    <table class="table">
                        <colgroup>
                            <col style="width:30%">
                            <col style="width:70%">
                        </colgroup>
                        <tbody>
                        <tr>
                            <td><b>Tên thường gọi:</b><span class="text-danger">*</span></td>
                            <td><input name="commonName" class="form-control"/> </td>
                        </tr>
                        <tr>
                            <td><b>Tên khác:</b></td>
                            <td><input name="otherName" class="form-control"/> </td>
                        </tr>
                        <tr>
                            <td><b>Tên khoa học:</b><span class="text-danger">*</span></td>
                            <td><input name="scienceName" class="form-control"/> </td>
                        </tr>
                        <tr>
                            <td><b>Đặc điểm:</b><span class="text-danger">*</span></td>
                            <td><textarea name="characteristic" class="full-width " name=""  rows="4"></textarea></td>
                        </tr>
                        <tr>
                            <td><b>Nơi phân bố:</b></td>
                            <td><input name="location" class="form-control"/> </td>
                        </tr>
                        <tr>
                            <td><b>Công dụng:</b><span class="text-danger">*</span></td>
                            <td><input name="utility" class="form-control"/> </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><button type="submit" class="btn-u">Đăng</button></td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div><!--/end row-->
    </div>
</div>
<!--=== End Shop Product ===-->
@endsection

@section('pageJS')
            <!-- Master Slider -->
    <script src={{asset('assets/plugins/master-slider/masterslider/masterslider.min.js')}}></script>
    <script src={{asset('assets/plugins/master-slider/masterslider/jquery.easing.min.js')}}></script>
    <script src={{asset('assets/js/plugins/master-slider.js')}}></script>
    <script src={{asset('assets/js/forms/product-quantity.js')}}></script>
    <script src={{asset('assets/js/plugins/master-slider.js')}}></script>
    <script src={{asset('assets/js/forms/product-quantity.js')}}></script>
    <script src={{asset('assets/plugins/dropzone/dist/dropzone.js')}}></script>

    <script>

        Dropzone.autoDiscover = false;
        Dropzone.options.imageDropzone = {
            maxFilesize: 1 //MB
        };
        Dropzone.prototype.defaultOptions.dictDefaultMessage = "Kéo thả file hoặc click để upload";
        var uploadedImages = [];

        jQuery(document).ready(function() {
            App.init();
            App.initScrollBar();
            OwlCarousel.initOwlCarousel();
            StyleSwitcher.initStyleSwitcher();
            MasterSliderShowcase2.initMasterSliderShowcase2();

            var imageDropzone = new Dropzone("#image-dropzone");
            imageDropzone.on("success", function(file, response) {
                uploadedImages.push(response.file);
            });
            $('#plant-adding-form').on('submit', function(event){
                event.preventDefault();
                var plantRaw = $(this).serializeJson();
                if(uploadedImages.length > 0){
                    plantRaw.imgUrl = JSON.stringify(uploadedImages);
                    plantRaw.thumbnailUrl = uploadedImages[0];
                }
                else{
                    plantRaw.imgUrl = plantRaw.thumbnailUrl = '';
                }
                var $createPlant = $.post($(this).attr('action'), plantRaw);

                $createPlant.then(function (response) {
                    if(response.status == 'error'){
                        var msg = '';
                        $.each(response.message, function(key, value){
                            msg += value + '\n';
                        });
                        alert (msg);
                    }else{
                        alert (response.message);
                        window.location.href = '/medicinalPlants'
                    }
                });
            });


        });
    </script>
@endsection