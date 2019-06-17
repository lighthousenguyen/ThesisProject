@extends('layout')
@section('title')
    VMN - Mạng cây thuốc nam
@endsection
@section('content')

        <!--=== Slider ===-->
<div class="tp-banner-container">
    <div class="tp-banner">
        <ul>
            <!-- SLIDE -->
            <li class="revolution-mch-1" data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Slide 1">
                <!-- MAIN IMAGE -->
                <img src="assets/img/33.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

                <div class="tp-caption revolution-ch1 sft start"
                     data-x="center"
                     data-hoffset="0"
                     data-y="100"
                     data-speed="1500"
                     data-start="500"
                     data-easing="Back.easeInOut"
                     data-endeasing="Power1.easeIn"
                     data-endspeed="300">
                    Mạng <br>
                    <strong>Thông tin</strong><br>
                    Cây thuốc nam
                </div>
            </li>
            <!-- END SLIDE -->

            <!-- SLIDE -->
            <li class="revolution-mch-1" data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Slide 2">
                <!-- MAIN IMAGE -->
                <img src="assets/img/123.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

                <div class="tp-caption revolution-ch3 sft start"
                     data-x="center"
                     data-hoffset="0"
                     data-y="140"
                     data-speed="1500"
                     data-start="500"
                     data-easing="Back.easeInOut"
                     data-endeasing="Power1.easeIn"
                     data-endspeed="300">
                    Nhiều <strong>Cây thuốc</strong> hữu ích
                </div>

                <!-- LAYER -->
                <div class="tp-caption revolution-ch4 sft"
                     data-x="center"
                     data-hoffset="-14"
                     data-y="210"
                     data-speed="1400"
                     data-start="2000"
                     data-easing="Power4.easeOut"
                     data-endspeed="300"
                     data-endeasing="Power1.easeIn"
                     data-captionhidden="off"
                     style="z-index: 6">
                    Dân dã, quen thuộc và dễ sử dụng
                </div>

                <!-- LAYER -->
                <div class="tp-caption sft"
                     data-x="center"
                     data-hoffset="0"
                     data-y="300"
                     data-speed="1600"
                     data-start="1800"
                     data-easing="Power4.easeOut"
                     data-endspeed="300"
                     data-endeasing="Power1.easeIn"
                     data-captionhidden="off"
                     style="z-index: 6">
                    <a href="{{route('medicinal-plant')}}" class="btn-u btn-brd btn-brd-hover btn-u-light">Xem ngay</a>
                </div>
            </li>
            <!-- END SLIDE -->

            <!-- SLIDE -->
            <li class="revolution-mch-1" data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Slide 3">
                <!-- MAIN IMAGE -->
                <img src="assets/img/11.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="right top" data-bgrepeat="no-repeat">

                <div class="tp-caption revolution-ch3 sft start"
                     data-x="right"
                     data-hoffset="5"
                     data-y="130"
                     data-speed="1500"
                     data-start="500"
                     data-easing="Back.easeInOut"
                     data-endeasing="Power1.easeIn"
                     data-endspeed="300">
                    Nhiều<strong> Bài thuốc </strong> hay
                </div>

                <!-- LAYER -->
                <div class="tp-caption revolution-ch4 sft"
                     data-x="right"
                     data-hoffset="0"
                     data-y="210"
                     data-speed="1400"
                     data-start="2000"
                     data-easing="Power4.easeOut"
                     data-endspeed="300"
                     data-endeasing="Power1.easeIn"
                     data-captionhidden="off"
                     style="z-index: 6">
                    Tinh hoa của y học cổ truyền
                </div>

                <!-- LAYER -->
                <div class="tp-caption sft"
                     data-x="right"
                     data-hoffset="0"
                     data-y="300"
                     data-speed="1600"
                     data-start="2800"
                     data-easing="Power4.easeOut"
                     data-endspeed="300"
                     data-endeasing="Power1.easeIn"
                     data-captionhidden="off"
                     style="z-index: 6">
                    <a href="{{route('remedies')}}" class="btn-u btn-brd btn-brd-hover btn-u-light">Xem ngay</a>
                </div>
            </li>
            <!-- END SLIDE -->

            <!-- SLIDE -->
            <li class="revolution-mch-1" data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Slide 4">
                <!-- MAIN IMAGE -->
                <img src="assets/img/22.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

                <!-- LAYER -->
                <div class="tp-caption revolution-ch2 sft"
                     data-x="center"
                     data-hoffset="0"
                     data-y="100"
                     data-speed="1500"
                     data-start="500"
                     data-easing="Power4.easeOut"
                     data-endspeed="300"
                     data-endeasing="Power1.easeIn"
                     data-captionhidden="off"
                     style="z-index: 6">
                    Tra cứu thông tin
                </div>

                <div class="tp-caption revolution-ch1 sft start"
                     data-x="center"
                     data-hoffset="0"
                     data-y="200"
                     data-speed="1400"
                     data-start="2000"
                     data-easing="Back.easeInOut"
                     data-endeasing="Power1.easeIn"
                     data-endspeed="300">
                    <strong>Nhà thuốc đông Y</strong>
                </div>

                <!-- LAYER -->
                <div class="tp-caption sft"
                     data-x="center"
                     data-hoffset="0"
                     data-y="370"
                     data-speed="1600"
                     data-start="2800"
                     data-easing="Power4.easeOut"
                     data-endspeed="300"
                     data-endeasing="Power1.easeIn"
                     data-captionhidden="off"
                     style="z-index: 6">
                    <a href="#" class="btn-u btn-brd btn-brd-hover btn-u-light">Xem ngay</a>
                </div>
            </li>
            <!-- END SLIDE -->

            <!-- SLIDE -->
            {{--<li class="revolution-mch-1" data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Slide 5">--}}
                {{--<!-- MAIN IMAGE -->--}}
                {{--<img src="assets/img/4.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="right top" data-bgrepeat="no-repeat">--}}

                {{--<div class="tp-caption revolution-ch5 sft start"--}}
                     {{--data-x="right"--}}
                     {{--data-hoffset="5"--}}
                     {{--data-y="130"--}}
                     {{--data-speed="1500"--}}
                     {{--data-start="500"--}}
                     {{--data-easing="Back.easeInOut"--}}
                     {{--data-endeasing="Power1.easeIn"--}}
                     {{--data-endspeed="300">--}}
                    {{--<strong>Jeans</strong> Collection--}}
                {{--</div>--}}

                {{--<!-- LAYER -->--}}
                {{--<div class="tp-caption revolution-ch4 sft"--}}
                     {{--data-x="right"--}}
                     {{--data-hoffset="-14"--}}
                     {{--data-y="210"--}}
                     {{--data-speed="1400"--}}
                     {{--data-start="2000"--}}
                     {{--data-easing="Power4.easeOut"--}}
                     {{--data-endspeed="300"--}}
                     {{--data-endeasing="Power1.easeIn"--}}
                     {{--data-captionhidden="off"--}}
                     {{--style="z-index: 6">--}}
                    {{--Cras non dui et quam auctor pretium.<br>--}}
                    {{--Aenean enim tortr, tempus et iteus m--}}
                {{--</div>--}}

                {{--<!-- LAYER -->--}}
                {{--<div class="tp-caption sft"--}}
                     {{--data-x="right"--}}
                     {{--data-hoffset="0"--}}
                     {{--data-y="300"--}}
                     {{--data-speed="1600"--}}
                     {{--data-start="2800"--}}
                     {{--data-easing="Power4.easeOut"--}}
                     {{--data-endspeed="300"--}}
                     {{--data-endeasing="Power1.easeIn"--}}
                     {{--data-captionhidden="off"--}}
                     {{--style="z-index: 6">--}}
                    {{--<a href="#" class="btn-u btn-brd btn-brd-hover btn-u-light">Shop Now</a>--}}
                {{--</div>--}}
            {{--</li>--}}
            <!-- END SLIDE -->
        </ul>
        <div class="tp-bannertimer tp-bottom"></div>
    </div>
</div>
<!--=== End Slider ===-->

<!--=== Product Content ===-->
<div class="container content-md">

    <div class="heading heading-v1 margin-bottom-20">
        <h2>CÂY THUỐC NỔI BẬT</h2>
        <p>Những cây thuốc nhận được sự quan tâm của cộng đồng</p>
    </div>
    <!--=== Illustration v2 ===-->
    <div class="illustration-v2 margin-bottom-60">
        <div class="customNavigation margin-bottom-25">
            <a class="owl-btn prev rounded-x"><i class="fa fa-angle-left"></i></a>
            <a class="owl-btn next rounded-x"><i class="fa fa-angle-right"></i></a>
        </div>

        <ul class="list-inline owl-slider">
            @foreach($prominentMedicalPlants as $prominentPlant)
            <li class="item">
                <div class="product-img">
                    <a href="#"><img class="full-width img-responsive home-image" src="{{$prominentPlant->thumbnailUrl}}" alt=""></a>
                    <a class="add-to-cart" href="{{route('plant-detail',['id' => $prominentPlant->id])}}"><i class="fa fa-eye"></i>CHI TIẾT</a>
                </div>
                <div class="product-description product-description-brd">
                    <div class="overflow-h margin-bottom-5">
                        <div class="pull-left">
                            <h4 class="title-price">
                                <a href="{{route('plant-detail',['id' => $prominentPlant->id])}}">{{$prominentPlant->commonName}}</a></h4>
                        </div>
                    </div>
                    <ul class="list-inline product-ratings">
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating fa fa-star"></i></li>
                        <li><i class="rating fa fa-star"></i></li>
                    </ul>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <!--=== End Illustration v2 ===-->

    <div class="heading heading-v1 margin-bottom-40">
        <h2>CÂY THUỐC MỚI ĐĂNG</h2>
    </div>

    <!--=== Illustration v2 ===-->
    <div class="row illustration-v2">
        @foreach($newMedicinalPlants as $plant)
        <div class="col-md-3 col-sm-6 md-margin-bottom-30">
            <div class="product-img">
                <img class="full-width img-responsive home-image" src="{{$plant->thumbnailUrl}}" alt="">
                <a class="add-to-cart" href="{{route('plant-detail',['id' => $plant->id])}}"><i class="fa fa-eye"></i>CHI TIẾT</a>
            </div>
            <div class="product-description product-description-brd">
                <div class="overflow-h margin-bottom-5">
                    <div class="pull-left">
                        <h4 class="title-price">
                            <a href="{{route('plant-detail',['id' => $plant->id])}}">
                                {{$plant->commonName}}</a>
                        </h4>
                    </div>
                </div>
                <ul class="list-inline product-ratings">
                    <li><i class="rating-selected fa fa-star"></i></li>
                    <li><i class="rating-selected fa fa-star"></i></li>
                    <li><i class="rating-selected fa fa-star"></i></li>
                    <li><i class="rating fa fa-star"></i></li>
                    <li><i class="rating fa fa-star"></i></li>
                </ul>
            </div>
        </div>
        @endforeach
    </div>
    <!--=== End Illustration v2 ===-->
</div>
<!--=== End Product Content ===-->


{{--<div class="container">--}}

    {{--<!--=== Illustration v4 ===-->--}}
    {{--<div class="row illustration-v4 margin-bottom-40">--}}
        {{--<div class="col-md-4">--}}
            {{--<div class="heading heading-v1 margin-bottom-20">--}}
                {{--<h2>Top Rated</h2>--}}
            {{--</div>--}}
            {{--<div class="thumb-product">--}}
                {{--<img class="thumb-product-img" src="assets/img/thumb/08.jpg" alt="">--}}
                {{--<div class="thumb-product-in">--}}
                    {{--<h4><a href="shop-ui-inner.html">Yuketen</a> – <a href="shop-ui-inner.html">Derby Shoe</a></h4>--}}
                    {{--<span class="thumb-product-type">Footwear - Oxfords</span>--}}
                {{--</div>--}}
                {{--<ul class="list-inline overflow-h">--}}
                    {{--<li class="thumb-product-price line-through">$75.00</li>--}}
                    {{--<li class="thumb-product-price">$65.00</li>--}}
                    {{--<li class="thumb-product-purchase"><a href="#"><i class="fa fa-shopping-cart"></i></a> | <a href="#"><i class="fa fa-heart"></i></a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="thumb-product">--}}
                {{--<img class="thumb-product-img" src="assets/img/thumb/09.jpg" alt="">--}}
                {{--<div class="thumb-product-in">--}}
                    {{--<h4><a href="shop-ui-inner.html">Yuketen</a> – <a href="shop-ui-inner.html">Derby Shoe</a></h4>--}}
                    {{--<span class="thumb-product-type">Footwear - Oxfords</span>--}}
                {{--</div>--}}
                {{--<ul class="list-inline overflow-h">--}}
                    {{--<li class="thumb-product-price">$75.00</li>--}}
                    {{--<li class="thumb-product-purchase"><a href="#"><i class="fa fa-shopping-cart"></i></a> | <a href="#"><i class="fa fa-heart"></i></a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="thumb-product">--}}
                {{--<img class="thumb-product-img" src="assets/img/thumb/03.jpg" alt="">--}}
                {{--<div class="thumb-product-in">--}}
                    {{--<h4><a href="shop-ui-inner.html">Yuketen</a> – <a href="shop-ui-inner.html">Derby Shoe</a></h4>--}}
                    {{--<span class="thumb-product-type">Footwear - Oxfords</span>--}}
                {{--</div>--}}
                {{--<ul class="list-inline overflow-h">--}}
                    {{--<li class="thumb-product-price">$75.00</li>--}}
                    {{--<li class="thumb-product-purchase"><a href="#"><i class="fa fa-shopping-cart"></i></a> | <a href="#"><i class="fa fa-heart"></i></a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-4">--}}
            {{--<div class="heading heading-v1 margin-bottom-20">--}}
                {{--<h2>Best Sellers</h2>--}}
            {{--</div>--}}
            {{--<div class="thumb-product">--}}
                {{--<img class="thumb-product-img" src="assets/img/thumb/02.jpg" alt="">--}}
                {{--<div class="thumb-product-in">--}}
                    {{--<h4><a href="shop-ui-inner.html">Yuketen</a> – <a href="shop-ui-inner.html">Derby Shoe</a></h4>--}}
                    {{--<span class="thumb-product-type">Footwear - Oxfords</span>--}}
                {{--</div>--}}
                {{--<ul class="list-inline overflow-h">--}}
                    {{--<li class="thumb-product-price">$75.00</li>--}}
                    {{--<li class="thumb-product-purchase"><a href="#"><i class="fa fa-shopping-cart"></i></a> | <a href="#"><i class="fa fa-heart"></i></a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="thumb-product">--}}
                {{--<img class="thumb-product-img" src="assets/img/thumb/10.jpg" alt="">--}}
                {{--<div class="thumb-product-in">--}}
                    {{--<h4><a href="shop-ui-inner.html">Yuketen</a> – <a href="shop-ui-inner.html">Derby Shoe</a></h4>--}}
                    {{--<span class="thumb-product-type">Footwear - Oxfords</span>--}}
                {{--</div>--}}
                {{--<ul class="list-inline overflow-h">--}}
                    {{--<li class="thumb-product-price">$75.00</li>--}}
                    {{--<li class="thumb-product-purchase"><a href="#"><i class="fa fa-shopping-cart"></i></a> | <a href="#"><i class="fa fa-heart"></i></a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="thumb-product">--}}
                {{--<img class="thumb-product-img" src="assets/img/thumb/06.jpg" alt="">--}}
                {{--<div class="thumb-product-in">--}}
                    {{--<h4><a href="shop-ui-inner.html">Yuketen</a> – <a href="shop-ui-inner.html">Derby Shoe</a></h4>--}}
                    {{--<span class="thumb-product-type">Footwear - Oxfords</span>--}}
                {{--</div>--}}
                {{--<ul class="list-inline overflow-h">--}}
                    {{--<li class="thumb-product-price line-through">$75.00</li>--}}
                    {{--<li class="thumb-product-price">$65.00</li>--}}
                    {{--<li class="thumb-product-purchase"><a href="#"><i class="fa fa-shopping-cart"></i></a> | <a href="#"><i class="fa fa-heart"></i></a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-4 padding">--}}
            {{--<div class="heading heading-v1 margin-bottom-20">--}}
                {{--<h2>Sale Items</h2>--}}
            {{--</div>--}}
            {{--<div class="thumb-product">--}}
                {{--<img class="thumb-product-img" src="assets/img/thumb/07.jpg" alt="">--}}
                {{--<div class="thumb-product-in">--}}
                    {{--<h4><a href="shop-ui-inner.html">Yuketen</a> – <a href="shop-ui-inner.html">Derby Shoe</a></h4>--}}
                    {{--<span class="thumb-product-type">Footwear - Oxfords</span>--}}
                {{--</div>--}}
                {{--<ul class="list-inline overflow-h">--}}
                    {{--<li class="thumb-product-price line-through">$75.00</li>--}}
                    {{--<li class="thumb-product-price">$65.00</li>--}}
                    {{--<li class="thumb-product-purchase"><a href="#"><i class="fa fa-shopping-cart"></i></a> | <a href="#"><i class="fa fa-heart"></i></a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="thumb-product">--}}
                {{--<img class="thumb-product-img" src="assets/img/thumb/04.jpg" alt="">--}}
                {{--<div class="thumb-product-in">--}}
                    {{--<h4><a href="shop-ui-inner.html">Yuketen</a> – <a href="shop-ui-inner.html">Derby Shoe</a></h4>--}}
                    {{--<span class="thumb-product-type">Footwear - Oxfords</span>--}}
                {{--</div>--}}
                {{--<ul class="list-inline overflow-h">--}}
                    {{--<li class="thumb-product-price">$75.00</li>--}}
                    {{--<li class="thumb-product-purchase"><a href="#"><i class="fa fa-shopping-cart"></i></a> | <a href="#"><i class="fa fa-heart"></i></a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="thumb-product">--}}
                {{--<img class="thumb-product-img" src="assets/img/thumb/05.jpg" alt="">--}}
                {{--<div class="thumb-product-in">--}}
                    {{--<h4><a href="shop-ui-inner.html">Yuketen</a> – <a href="shop-ui-inner.html">Derby Shoe</a></h4>--}}
                    {{--<span class="thumb-product-type">Footwear - Oxfords</span>--}}
                {{--</div>--}}
                {{--<ul class="list-inline overflow-h">--}}
                    {{--<li class="thumb-product-price">$75.00</li>--}}
                    {{--<li class="thumb-product-purchase"><a href="#"><i class="fa fa-shopping-cart"></i></a> | <a href="#"><i class="fa fa-heart"></i></a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div><!--/end row-->--}}
    {{--<!--=== End Illustration v4 ===-->--}}
{{--</div><!--/end cotnainer-->--}}

{{--<!--=== Sponsors ===-->--}}
{{--<div class="container content">--}}
    {{--<div class="heading heading-v1 margin-bottom-40">--}}
        {{--<h2>Sponsors</h2>--}}
        {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed odio elit, ultrices vel cursus sed, placerat ut leo. Phasellus in magna erat. Etiam gravida convallis augue non tincidunt. Nunc lobortis dapibus neque quis lacinia. Nam dapibus tellus sit amet odio venenatis</p>--}}
    {{--</div>--}}

    {{--<ul class="list-inline owl-slider-v2">--}}
        {{--<li class="item first-child">--}}
            {{--<img src="assets/img/clients/07.png" alt="">--}}
        {{--</li>--}}
        {{--<li class="item">--}}
            {{--<img src="assets/img/clients/08.png" alt="">--}}
        {{--</li>--}}
        {{--<li class="item">--}}
            {{--<img src="assets/img/clients/10.png" alt="">--}}
        {{--</li>--}}
        {{--<li class="item">--}}
            {{--<img src="assets/img/clients/11.png" alt="">--}}
        {{--</li>--}}
        {{--<li class="item">--}}
            {{--<img src="assets/img/clients/09.png" alt="">--}}
        {{--</li>--}}
        {{--<li class="item">--}}
            {{--<img src="assets/img/clients/12.png" alt="">--}}
        {{--</li>--}}
        {{--<li class="item">--}}
            {{--<img src="assets/img/clients/07.png" alt="">--}}
        {{--</li>--}}
        {{--<li class="item">--}}
            {{--<img src="assets/img/clients/08.png" alt="">--}}
        {{--</li>--}}
        {{--<li class="item">--}}
            {{--<img src="assets/img/clients/09.png" alt="">--}}
        {{--</li>--}}
        {{--<li class="item">--}}
            {{--<img src="assets/img/clients/10.png" alt="">--}}
        {{--</li>--}}
        {{--<li class="item">--}}
            {{--<img src="assets/img/clients/11.png" alt="">--}}
        {{--</li>--}}
        {{--<li class="item">--}}
            {{--<img src="assets/img/clients/12.png" alt="">--}}
        {{--</li>--}}
    {{--</ul><!--/end owl-carousel-->--}}
{{--</div>--}}
{{--<!--=== End Sponsors ===-->--}}

@endsection
@section('pageJS')
    <script>
        jQuery(document).ready(function() {
            App.init();
            App.initScrollBar();
            App.initParallaxBg();
            OwlCarousel.initOwlCarousel();
            RevolutionSlider.initRSfullWidth();
            StyleSwitcher.initStyleSwitcher();
        });
    </script>
@endsection