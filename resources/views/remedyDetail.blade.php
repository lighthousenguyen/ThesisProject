@extends('layout')
@section('title')
    {{$remedy->title}}
@endsection
@section('pageCss')

    <link rel="stylesheet" href="{{asset('assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/master-slider/masterslider/style/masterslider.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/master-slider/masterslider/skins/default/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css')}}">
    @endsection

    @section('content')
            <!--=== Shop Product ===-->
    <div class="shop-product content">

        <div class="container">
            <div class="row">
                <div class="col-md-6 md-margin-bottom-50">
                    <div class="ms-showcase2-template">
                        <!-- Master Slider -->
                        <div class="master-slider ms-skin-default" id="masterslider">
                            @if($images != null && $images != '')
                                @foreach($images as $image)
                                    <div class="ms-slide">
                                        <img class="ms-brd" src="assets/img/blank.gif" data-src="{{$image}}" alt="">
                                        <img class="ms-thumb" src="{{$image}}" alt="thumb">
                                    </div>
                                @endforeach
                            @else
                                <div class="ms-slide">
                                    <img class="ms-brd" src="assets/img/blank.gif" data-src="assets/img/default/noImage.jpg" alt="">
                                </div>
                            @endif
                        </div>
                        <!-- End Master Slider -->
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="shop-product-heading">
                        <h2>Nội dung bài thuốc</h2>
                        @if (\Session::get('credential'))
                            <ul class="list-inline shop-product-social">
                                @if(\Session::get('credential')['attributes']['name'] == $remedy->author)
                                    <li><a href="{{route('edit-remedy',['id' => $remedy->id])}}" class="btn-u btn-u-green">Chỉnh sửa <i class="fa fa-pencil"></i></a></li>
                                @else
                                    <li><button class="btn-u btn-u-red" data-toggle="modal" data-target="#report-modal">
                                            Báo cáo</button></li>
                                @endif
                                @if(\Session::get('credential')['attributes']['role'] == 'store')
                                    <li><button id="registerPrescription" data-resgister="{{$remedy->id}}" class="btn-u btn-u-green" title="Đưa bài thuốc vào danh mục của nhà thuốc">
                                            <i class="fa fa-list-alt" aria-hidden="true"></i></button></li>
                                @endif
                            </ul>
                        @endif
                    </div><!--/end shop product social-->

                    <ul class="list-inline product-ratings margin-bottom-30">
                        <li class="product-review-list">
                            <div
                                    class="fb-like"
                                    data-share="true"
                                    data-width="450"
                                    data-show-faces="true">
                            </div>
                        </li>
                    </ul><!--/end shop product ratings-->

                    <table class="table">
                        <colgroup>
                            <col style="width:30%">
                            <col style="width:70%">
                        </colgroup>
                        <tbody>
                        <tr>
                            <td><b>Tiêu đề:</b></td>
                            <td>{{$remedy->title}}</td>
                        </tr>
                        <tr>
                            <td><b>Thành phần</b></td>
                            <td>
                                @foreach($ingredient as $plant)
                                    @if(isset($plant->id))
                                        [<a href="{{route('plant-detail',['id' => $plant->id])}}">
                                            {{$plant->medicinalPlantName}}</a>]
                                    @else
                                        [<a href="{{route('medicinal-plant',['keyword' => $plant->medicinalPlantName])}}">
                                            {{$plant->medicinalPlantName}}</a>]
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td><b>Mô tả:</b></td>
                            <td>{{$remedy->description}}</td>
                        </tr>
                        <tr>
                            <td><b>Cách dùng:</b></td>
                            <td>{{$remedy->usage}}</td>
                        </tr>
                        <tr>
                            <td><b>Lưu ý:</b></td>
                            <td>{{$remedy->note}}</td>
                        </tr>
                        <tr>
                            <td><b>Công dụng:</b></td>
                            <td>{{$remedy->utility}}</td>
                        </tr>
                        <tr>
                            <td><b>Người đóng góp:</b></td>
                            <td><a href="{{route('profile',['account' => $remedy->author])}}">
                                    {{$remedy->author}}</a></td>
                        </tr>
                        <tr>
                            <td><b>Đánh giá</b></td>
                            <td><div class="stars-ratings" data-rate="{{$remedy->id}}">
                                    <input type="radio" name="stars-rating" id="stars-rating-5">
                                    <label for="stars-rating-5"><i class="fa fa-star fa-lg"></i></label>
                                    <input type="radio" name="stars-rating" id="stars-rating-4">
                                    <label for="stars-rating-4"><i class="fa fa-star fa-lg"></i></label>
                                    <input type="radio" name="stars-rating" id="stars-rating-3">
                                    <label for="stars-rating-3"><i class="fa fa-star fa-lg"></i></label>
                                    <input type="radio" name="stars-rating" id="stars-rating-2">
                                    <label for="stars-rating-2"><i class="fa fa-star fa-lg"></i></label>
                                    <input type="radio" name="stars-rating" id="stars-rating-1">
                                    <label for="stars-rating-1"><i class="fa fa-star fa-lg"></i></label>
                                </div></td>
                        </tr>
                        </tbody></table>
                </div>
            </div><!--/end row-->
        </div>
    </div>
    <!--=== End Shop Product ===-->

    <!--=== Content Medium ===-->
    <div class="content-md container">

        <div class="tab-v6">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#reviews" role="tab" data-toggle="tab">Đánh giá (<span id="noOfcomment">{!! count($comments) !!}</span>)</a></li>
                <li><a href="#related" role="tab" data-toggle="tab">Nhà thuốc liên quan</a></li>
            </ul>

            <div class="tab-content">
                <!-- Reviews -->
                <div class="tab-pane fade in active" id="reviews">
                    <div id="old-review">
                        @foreach($comments as $comment)
                            <div class="product-comment margin-bottom-20">
                                <div class="product-comment-in">
                                    <img class="product-comment-img rounded-x" src="assets/img/team/01.jpg" alt="">
                                    <div class="product-comment-dtl">
                                        <h4><a>{{$comment->reviewer}}</a> <small>{{$comment->created_at}}</small></h4>
                                        <div>{!! nl2br($comment->comment) !!}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if (\Session::get('credential'))
                        <h3 class="heading-md margin-bottom-30">Bình luận</h3>
                        <form action="/reviewRemedy" method="post" data-review="{{$remedy->id}}" id="review" class="sky-form sky-changes-4">
                            <fieldset>
                                <div class="margin-bottom-30">
                                    <label class="textarea">
                                        <textarea rows="3" placeholder="Viết bình luận ..." name="commentContent" id="message"></textarea>
                                    </label>
                                </div>
                            </fieldset>

                            <footer class="review-submit">
                                <label class="label-v2">Review</label>

                                <button type="submit" class="btn-u btn-u-sea-shop btn-u-sm pull-right">Gửi</button>
                            </footer>
                        </form>
                    @endif
                </div>
                <!-- End Reviews -->
                <!-- Related -->
                <div class="tab-pane fade " id="related">
                <!--=== Illustration v2 ===-->
                <div class="container">
                    <div class="heading heading-v1 margin-bottom-20">
                        <h2>Nhà thuốc liên quan</h2>
                    </div>

                    <div class="illustration-v2 margin-bottom-60">
                        <div class="customNavigation margin-bottom-25">
                        <a class="owl-btn prev rounded-x"><i class="fa fa-angle-left"></i></a>
                        <a class="owl-btn next rounded-x"><i class="fa fa-angle-right"></i></a>
                    </div>

                <ul class="list-inline owl-slider-v4">
                    @foreach($related as $store)
                    <li class="item">
                        <a href="#"><img class="img-responsive" src="{{$store->storeAvatar}}" alt=""></a>
                        <div class="product-description-v2">
                        <div class="margin-bottom-5">
                        <h4 class="title-price"><a href="{{route('profile',['account' => $store->storeCredential])}}">{{$store->storeName}}</a></h4>
                        </div>
                        </div>
                    </li>
                    @endforeach

                </ul>
                </div>
                </div>
                <!--=== End Illustration v2 ===-->
                </div>
                        <!-- End related -->
            </div>
        </div>
    </div><!--/end container-->
    <!--=== End Content Medium ===-->

    <!-- Report Modal -->
    <div id="report-modal" class="modal fade" role="dialog">
        <form class="modal-dialog" id="report" action="/reportRemedy" data-report="{{$remedy->id}}">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Báo cáo vi phạm</h4>
                </div>
                <div class="modal-body">
                    <textarea name="report_reason" id="" placeholder="Nhập nguyên nhân" rows="8"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn-u btn-u-orange rounded" >Gửi báo cáo</button>
                </div>
            </div>

        </form>
    </div>
    @endsection

    @section('pageJS')
            <!-- Master Slider -->
    <script src={{asset('assets/plugins/master-slider/masterslider/masterslider.min.js')}}></script>
    <script src={{asset('assets/plugins/master-slider/masterslider/jquery.easing.min.js')}}></script>
    <script src={{asset('assets/js/plugins/master-slider.js')}}></script>
    <script src={{asset('assets/js/forms/product-quantity.js')}}></script>
    <script src={{asset('assets/js/plugins/master-slider.js')}}></script>
    <script src={{asset('assets/js/forms/product-quantity.js')}}></script>
    <script src={{asset('assets/js/plugins/serializeJson.js')}}></script>
    <script>
        jQuery(document).ready(function() {
            App.init();
            App.initScrollBar();
            OwlCarousel.initOwlCarousel();
            StyleSwitcher.initStyleSwitcher();
            MasterSliderShowcase2.initMasterSliderShowcase2();

            $(":radio").on('click', function(){
                var rating = {
                    ratingPoint : this.id.substr(-1),
                    Id          : $(this).parent().attr('data-rate')
                }
                var $rating = $.post('/ratingRemedy', rating);
                $rating.then(function(response){
                    alert (response.message)
                    $(":radio").prop('disabled', true);
                })
            });

            $('#review').on('submit', function(event){
                event.preventDefault();
                var review = $(this).serializeJson();
                review.ratingPoint =  ratingPoint;
                review.Id = $(this).attr("data-review");
                var sendReview = $.post($(this).attr('action'), review);
                sendReview.then(function(response){
                    window.location.reload();
                });
            });

            $('#report').on('submit', function(event){
                event.preventDefault();
                var report = $(this).serializeJson();
                report.reported = $(this).attr("data-report");
                var sendReport = $.post($(this).attr('action'), report);
                sendReport.then(function(response){
                    alert(response.msg);
                    $('#report-modal').modal('hide');
                });
            });

            $('#registerPrescription').on('click', function(){
                event.preventDefault();
                var $approve = $.ajax({
                    method: "PUT",
                    url: "/registerPrescription",
                    data: {id: $(this).attr('data-resgister')}
                });
                $approve.then(function(response){
                    alert (response.message);
//                    location.reload();
                });
            });

        });
    </script>
@endsection

