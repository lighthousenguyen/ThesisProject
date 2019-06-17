@extends('layout')
@section('title')
    Tìm kiếm cây thuốc nâng cao
@endsection
@section('content')
    <!--=== Content Part ===-->
        <div class="content container">
        <div class="row">
            <div class="col-md-4 filter-by-block md-margin-bottom-60">
                <h1>TÌM KIẾM</h1>
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default panel-body">
                        <form id="searchInfo" class="panel-collapse" method="get" action="/advanceSearchPlant" >
                            <div class="form-group">
                                <label for="characteristic">Đặc điểm:</label>
                                <input type="text" class="form-control" id="characteristic" name="characteristic" value="{{$condition->characteristic()}}">
                            </div>
                            <div class="form-group">
                                <label for="scienceName">Tên khoa học:</label>
                                <input type="text" class="form-control" id="scienceName" name="scienceName" value="{{$condition->scienceName()}}">
                            </div>
                            <div class="form-group">
                                <label for="characteristic">Công dụng:</label>
                                <input type="text" class="form-control" id="utility" name="utility" value="{{$condition->utility()}}">
                            </div>
                            <label for="ratingPoint">Điểm đánh giá</label>
                            <select class="form-control" id="ratingPoint" name="ratingPoint">
                                @for($i = 0; $i<=5; $i ++)
                                    @if($i == $condition->ratingPoint())
                                    <option value="{{$i}}" selected>{{$i}}</option>
                                    @else
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endif
                                @endfor
                            </select>
                            <button type="submit" class="btn-u margin-top-20">Tìm kiếm</button>

                        </form>
                    </div>
                </div><!--/end panel group-->

            </div>
            <div class="col-md-8">
                <div class="row margin-bottom-5">
                    <div class="col-sm-8 result-category">
                        <h2><span class="hidden-xs">DANH SÁCH</span> CÂY THUỐC</h2>
                        <small class="shop-bg-red badge-results">{{$plants->total()}} Kết quả</small>
                    </div>
                </div>
                <div class="filter-results">
                    @foreach($plants as $plant)
                    <div class="list-product-description product-description-brd margin-bottom-30">
                        <div class="row">
                            <div class="col-sm-4">
                                <a href="shop-ui-inner.html"><img class="img-responsive sm-margin-bottom-20" src="{!! $plant->thumbnailUrl ? $plant->thumbnailUrl : 'assets/img/team/01.jpg'!!}"  alt=""></a>
                            </div>
                            <div class="col-sm-8 product-description">
                                <div class="overflow-h margin-bottom-5">
                                    <ul class="list-inline overflow-h">
                                        <li><h1 class="title-price"><a href="{{route('plant-detail',['id' => $plant->id])}}">{{$plant->commonName}}</a></h1></li>
                                        <li class="pull-right">
                                            <ul class="list-inline product-ratings">
                                                <li><i class="rating-selected fa fa-star"></i></li>
                                                <li><i class="rating-selected fa fa-star"></i></li>
                                                <li><i class="rating-selected fa fa-star"></i></li>
                                                <li><i class="rating fa fa-star"></i></li>
                                                <li><i class="rating fa fa-star"></i></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <p class="margin-bottom-20">{{str_limit($plant->characteristic, 250)}}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div><!--/end filter resilts-->

                {!! $plants->render() !!}<!--/end pagination-->
            </div>
        </div><!--/end row-->
        </div><!--/end container-->
        <!--=== End Content Part ===-->
@endsection