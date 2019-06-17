@extends('layout')
@section('title')
Tìm kiếm bài thuốc nâng cao
@endsection
@section('content')
<!--=== Content Part ===-->
<div class="content container">
    <div class="row">
        <div class="col-md-4 filter-by-block md-margin-bottom-60">
            <h1>TÌM KIẾM</h1>
            <div class="panel-group" id="accordion">
                <div class="panel panel-default panel-body">
                    <form id="searchInfo" class="panel-collapse" method="get" action="/advanceSearchRemedy" >
                        <div class="form-group">
                            <label for="utility">Công dụng:</label>
                            <input type="text" class="form-control" id="utility" name="utility" value="{{$condition->utility()}}">
                        </div>
                        <div class="form-group">
                            <label for="ingredient">Thành phần:</label>
                            <input type="text" class="form-control" id="ingredient" name="ingredient" value="">
                        </div>

                        <button type="submit" class="btn-u margin-top-20">Tìm kiếm</button>

                    </form>
                </div>
            </div><!--/end panel group-->

        </div>
        <div class="col-md-8">
            <div class="row margin-bottom-5">
                <div class="col-sm-8 result-category">
                    <h2>DANH SÁCH BÀI THUỐC</h2>
                    <small class="shop-bg-red badge-results">{{$remedies->total()}} Kết quả</small>
                </div>
            </div>
            <div class="filter-results">
                @foreach($remedies as $remedy)
                <div class="list-product-description product-description-brd margin-bottom-30">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="shop-ui-inner.html"><img class="img-responsive sm-margin-bottom-20" src="{!! $remedy->thumbnailUrl ? $remedy->thumbnailUrl : 'assets/img/team/01.jpg'!!}"  alt=""></a>
                        </div>
                        <div class="col-sm-8 product-description">
                            <div class="overflow-h margin-bottom-5">
                                <ul class="list-inline overflow-h">
                                    <li><h1 class="title-price"><a href="{{route('remedy-detail',['id' => $remedy->id])}}">{{$remedy->title}}</a></h1></li>
                                </ul>
                                <p class="margin-bottom-20">
                                    {{$remedy->description}}
                                </p>
                                <p class="margin-bottom-20">
                                    {{$remedy->note}}
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div><!--/end filter resilts-->

            {!! $remedies->render() !!}<!--/end pagination-->
        </div>
    </div><!--/end row-->
</div><!--/end container-->
<!--=== End Content Part ===-->
@endsection