@extends('layout')
@section('title')
    Đóng góp bài thuốc
@endsection
@section('pageCss')

    <link rel="stylesheet" href="{{asset('assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/master-slider/masterslider/style/masterslider.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/master-slider/masterslider/skins/default/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/dropzone/dist/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/jquery/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/sliptree-bootstrap/dist/css/tokenfield-typeahead.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/sliptree-bootstrap/dist/css/bootstrap-tokenfield.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/sliptree-bootstrap/docs-assets/css/pygments-manni.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/sliptree-bootstrap/docs-assets/css/docs.css')}}">
    @endsection


    @section('content')

            <!--=== Shop Product ===-->
    <div class="shop-product content">

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="ms-showcase2-template">
                        <form action="/index.php/upload"
                              class="dropzone"
                              id="image-dropzone">
                        </form>
                    </div>

                </div>
                <div class="col-md-6 md-margin-bottom-50">
                    <div class="shop-product-heading">
                        <h2>Nhập thông tin bài thuốc</h2>
                    </div>
                    <p>Những thông tin có đánh dấu <span class="text-danger">*</span> là bắt buộc nhập.</p>
                    <form id="remedy-adding" action="/updateRemedy" method="post" data-update="{{$remedy->id}}">
                        <table class="table">
                            <colgroup>
                                <col style="width:30%">
                                <col style="width:70%">
                            </colgroup>
                            <tbody>
                            <tr>
                                <td><b>Tiêu đề:</b><span class="text-danger">*</span></td>
                                <td><b>{{$remedy->title}}</b></td>
                            </tr>
                            <tr>
                                <td><b>Thành phần:</b></td>
                                <td>@foreach($ingredient as $plant)
                                        @if(isset($plant->id))
                                            [<a href="{{route('plant-detail',['id' => $plant->id])}}">
                                                {{$plant->medicinalPlantName}}</a>]
                                        @else
                                            [<a href="{{route('medicinal-plant',['keyword' => $plant->medicinalPlantName])}}">
                                                {{$plant->medicinalPlantName}}</a>]
                                        @endif
                                    @endforeach</td>
                            </tr>
                            <tr>
                                <td><b>Mô tả:</b><span class="text-danger">*</span></td>
                                <td><textarea name="description" class="full-width"
                                              rows="4"/>{{$remedy->description}}</textarea> </td>
                            </tr>
                            <tr>
                                <td><b>Cách dùng:</b><span class="text-danger">*</span></td>
                                <td><input name="usage" class="form-control" value="{{$remedy->usage}}"/> </td>
                            </tr>
                            <tr>
                                <td><b>Lưu ý:</b></td>
                                <td><textarea name="note" class="full-width " rows="4">{{$remedy->note}}</textarea></td>
                            </tr>
                            <tr>
                                <td><b>Công dụng:</b><span class="text-danger">*</span></td>
                                <td><input name="utility" class="form-control" value="{{$remedy->utility}}"/> </td>
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
    <script src={{asset('assets/plugins/dropzone/dist/dropzone.js')}}></script>

    <script>

        Dropzone.autoDiscover = false;
        Dropzone.options.imageDropzone = {
            maxFilesize: 1 //MB
        };
        Dropzone.prototype.defaultOptions.dictDefaultMessage = "Kéo thả file hoặc click để upload ảnh";
        var uploadedImages = [];
        jQuery(document).ready(function() {
            App.init();

            var imageDropzone = new Dropzone("#image-dropzone");
            imageDropzone.on("success", function(file, response) {
                uploadedImages.push(response.file);
            });

            $('#remedy-adding').on('submit', function(event){
                event.preventDefault();
                var remedyRaw = $(this).serializeJson();
                remedyRaw.remedyId = $(this).attr('data-update');
                if(uploadedImages.length > 0){
                    remedyRaw.images = JSON.stringify(uploadedImages);
                    remedyRaw.thumbnail = uploadedImages[0];
                }
                else{
                    remedyRaw.images = remedyRaw.thumbnail = '';
                }

                var $createPlant = $.post($(this).attr('action'), remedyRaw);

                $createPlant.then(function (response) {
                    alert (response.message);
                    if (response.status != 'error'){
                        window.location.href = '/remedies';
                    }
                });
            });
        });
    </script>
@endsection