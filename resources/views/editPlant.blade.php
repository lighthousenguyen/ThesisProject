@extends('layout')
@section('title')
    Chỉnh sửa cây thuốc
@endsection
@section('pageCss')

    <link rel="stylesheet" href="{{asset('assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/master-slider/masterslider/style/masterslider.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/master-slider/masterslider/skins/default/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/dropzone/dist/dropzone.css')}}">
    <style>
        .image-edit{
            width: 550px;
            height: 550px;
        }
    </style>
    @endsection

    @section('content')

            <!--=== Shop Product ===-->
    <div class="shop-product content">

        <div class="container">
            <div class="row">
                <div class="col-md-6 md-margin-bottom-50">
                    <div class="ms-showcase2-template">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                @foreach (json_decode($plant->imgUrl) as $k => $image)
                                    @if($k == 0)
                                    <div class="item active">
                                    @else
                                    <div class="item">
                                    @endif
                                    <img class="image-edit image-slide img-responsive" src="{{asset($image)}}" alt="">
                                    </div>
                                @endforeach
                                    <div class="item">
                                        <form action="/index.php/upload"
                                              class="dropzone image-edit"
                                              id="image-dropzone">
                                        </form>
                                    </div>
                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div> <!-- Carousel -->

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="shop-product-heading">
                        <h2>Nhập thông tin cây thuốc</h2>
                    </div><!--/end shop product social-->
                    <form id="plant-editing-form" data-update="{{$plant->id}}"  action="/updatePlants" method="post">
                        <table class="table">
                            <colgroup>
                                <col style="width:30%">
                                <col style="width:70%">
                            </colgroup>
                            <tbody>
                            <tr>
                                <td><b>Tên thường gọi:</b></td>
                                <td><input name="commonName" class="form-control" value="{{$plant->commonName}}" readonly/> </td>
                            </tr>
                            <tr>
                                <td><b>Tên khác:</b></td>
                                <td><input name="otherName" value="{{$plant->otherName}}" class="form-control"/> </td>
                            </tr>
                            <tr>
                                <td><b>Tên khoa học:</b></td>
                                <td><input name="scienceName" value="{{$plant->scienceName}}" readonly class="form-control"/> </td>
                            </tr>
                            <tr>
                                <td><b>Đặc điểm:</b></td>
                                <td><textarea name="characteristic" class="full-width"
                                              rows="4">{{$plant->characteristic}}</textarea></td>
                            </tr>
                            <tr>
                                <td><b>Nơi phân bố:</b></td>
                                <td><input name="location" value="{{$plant->location}}" class="form-control"/> </td>
                            </tr>
                            <tr>
                                <td><b>Công dụng:</b></td>
                                <td><input name="utility" value="{{$plant->utility}}" class="form-control"/> </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><button type="submit" class="btn-u">Gửi chỉnh sửa</button></td>
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
            $('#plant-editing-form').on('submit', function(event){
                event.preventDefault();
                var plantRaw = $(this).serializeJson();
                plantRaw.plantId = $(this).attr('data-update');
                if(uploadedImages.length > 0){
                    plantRaw.images = JSON.stringify(uploadedImages);
                    plantRaw.thumbnail = uploadedImages[0];
                }
                else{
                    plantRaw.images = plantRaw.thumbnail = '';
                }
                var $createPlant = $.post($(this).attr('action'), plantRaw);


                $createPlant.then(function (response) {
                    alert(response.message);
                    window.location.replace('/medicinalPlants');
                });
            });


        });
    </script>
@endsection