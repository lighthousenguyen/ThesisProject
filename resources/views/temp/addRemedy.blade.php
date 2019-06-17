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
    <link rel="stylesheet" href="{{asset('assets/plugins/jquery/jquery.auto-complete.css')}}">
    @endsection

    @section('content')

            <!--=== Shop Product ===-->
    <div class="shop-product content">

        <div class="container">
            <div class="row">
                <div class="col-md-6 md-margin-bottom-50">
                    <div class="shop-product-heading">
                        <h2>Nhập thông tin bài thuốc</h2>
                    </div>
                    <p>Những thông tin có đánh dấu <span class="text-danger">*</span> là bắt buộc nhập.</p>
                    <form id="remedy-adding" action="/contributeRemedy" method="post">
                        <table class="table">
                            <colgroup>
                                <col style="width:30%">
                                <col style="width:70%">
                            </colgroup>
                            <tbody>
                            <tr>
                                <td><b>Tiêu đề:</b><span class="text-danger">*</span></td>
                                <td><input name="title" class="form-control"/> </td>
                            </tr>
                            <tr>
                                <td><b>Mô tả:</b><span class="text-danger">*</span></td>
                                <td><textarea name="description" class="full-width" rows="4"/></textarea> </td>
                            </tr>
                            <tr>
                                <td><b>Lưu ý:</b></td>
                                <td><textarea name="note" class="full-width " rows="4"></textarea></td>
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

                <div class="col-md-6">
                    <div class="ms-showcase2-template">
                        <form action="/index.php/upload"
                              class="dropzone"
                              id="image-dropzone">
                        </form>
                    </div>
                    <h3>Nhập thành phần bài thuốc <span class="text-danger">*</span></h3>
                    <table id="ingredientTable" class="table">
                        <colgroup>
                            <col style="width:50%">
                            <col style="width:40%">
                        </colgroup>
                        <tr class="ingredient">
                            <td><input type="text" class="form-control" id="plant-1" placeholder="cây thuốc"></td>
                            <td><div class="input-group">
                                    <input type="text" class="form-control" id="dosage-1" placeholder="lượng">
                                    <span class="input-group-addon" id="basic-addon1">gam</span>
                                </div>
                                </td>
                            <td><button class="btn btn-default add-new-plant">+</button></td>
                            <td><button class="btn btn-default remove-plant" disabled="disabled">- </button></td>
                        </tr>
                    </table>
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
    <script src={{asset('assets/plugins/jquery/jquery.auto-complete.min.js')}}></script>

    <script>

        Dropzone.autoDiscover = false;
        Dropzone.options.imageDropzone = {
            maxFilesize: 1 //MB
        };
        Dropzone.prototype.defaultOptions.dictDefaultMessage = "Kéo thả file hoặc click để upload ảnh";
        var uploadedImages = [];

        jQuery(document).ready(function() {
            App.init();
            App.initScrollBar();
            OwlCarousel.initOwlCarousel();
            StyleSwitcher.initStyleSwitcher();
            MasterSliderShowcase2.initMasterSliderShowcase2();
            var listPlant = '<?php echo $listCurrentPlant; ?>';
            var imageDropzone = new Dropzone("#image-dropzone");
            imageDropzone.on("success", function(file, response) {
                uploadedImages.push(response.file);
            });

            $('#remedy-adding').on('submit', function(event){
                event.preventDefault();
                var plantRaw = $(this).serializeJson();

                if(uploadedImages.length > 0){
                    plantRaw.images = JSON.stringify(uploadedImages);
                    plantRaw.thumbnail = uploadedImages[0];
                }
                else{
                    plantRaw.images = plantRaw.thumbnail = '';
                }


                var $createPlant = $.post($(this).attr('action'), plantRaw);

                $createPlant.then(function (response) {
                    if (response.status == 'error'){
                        alert (response.message);
                    }
                });
            });
            enable_autoComplement( $("input[id^='plant']"));

            $('.add-new-plant').click(function(){
                var newRow = $('tr.ingredient:last').clone();
                newRow.children().children("input[id^='plant']")
                        .attr('id', 'plant-'+($("input[id^='plant']").length+1));
                enable_autoComplement( newRow.children().children("input[id^='plant']"));
                newRow.children().children("input[id^='dosage']")
                        .attr('id', 'dosage-'+($("input[id^='dosage']").length+1));
                newRow.children().children(".btn").remove();
                newRow.insertAfter('tr.ingredient:last');
                checkAbleMinus();
            });

            $('.remove-plant').click(function(){
                $('tr.ingredient:last').remove()
                checkAbleMinus();
            });

            function enable_autoComplement(element){
                $(element).autoComplete({
                    minChars: 1,
                    source: function(term, suggest){
                        term = term.toLowerCase();
                        var choices = JSON.parse(listPlant);
                        var suggestions = [];
                        for (i=0;i<choices.length;i++)
                            if (~(choices[i][0]+' '+choices[i][1]).toLowerCase().indexOf(term)) suggestions.push(choices[i]);
                        suggest(suggestions);
                    },
                    renderItem: function (item, search){
                        search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
                        var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
                        return '<div class="autocomplete-suggestion" data-name="'+item[0]+'" data-id="'+item[1]+'" data-val="'+search+'">'+item[0].replace(re, "<b>$1</b>")+'</div>';
                    },
                    onSelect: function (e, term, item){
                        element.val(item.data('name'));
                    }
                });
            }

            function checkAbleMinus(){
                if ($("input[id^='plant']").length > 1){
                    $('.remove-plant').removeAttr("disabled");
                }else{
                    $('.remove-plant').attr("disabled","disabled");
                }
            }
        });
    </script>
@endsection