@extends('layout')
@section('title')
    Trang nhà thuốc
    @endsection
    @section('content')
            <!--=== Content Part ===-->
    <div class="content container">
        <div class="row">
            <div class="col-md-4 filter-by-block md-margin-bottom-60">
                <h1>TÌM KIẾM</h1>
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default panel-body">
                        <form id="searchInfo" class="panel-collapse" method="get" action="/searchStore" >
                            <div class="form-group">
                                <label for="storename">Tên nhà thuốc:</label>
                                <input type="text" class="form-control" id="storename" name="storename" value="{{$condition->getStoreName()}}">
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ:</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{$condition->getAddress()}}">
                            </div>
                            <div class="form-group">
                                <label for="phonenumber">Số điện thoại:</label>
                                <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="{{$condition->getPhoneNumber()}}">
                            </div>
                            <div class="form-group">
                                <label for="representative">Người đại diện:</label>
                                <input type="text" class="form-control" id="representative" name="representative" value="{{$condition->getRepresentative()}}">
                            </div>

                            <button type="submit" class="btn-u margin-top-20">Tìm kiếm</button>
                            <button type="reset" class="btn-u margin-top-20">Nhập lại</button>

                        </form>
                    </div>
                </div><!--/end panel group-->

            </div>
            <div class="col-md-8">
                <div class="row margin-bottom-5">
                    <div class="col-sm-8 result-category">
                        <h2>DANH SÁCH NHÀ THUỐC</h2>
                        <small class="shop-bg-red badge-results">{{$listHMS->total()}} Kết quả</small>
                    </div>
                </div>
                <div class="filter-results">
                    @foreach($listHMS as $store)
                        <div class="list-product-description product-description-brd margin-bottom-30">
                            <div class="row">
                                <div class="col-sm-3">
                                    <a href="shop-ui-inner.html">
                                        <img class="img-responsive sm-margin-bottom-20" src="{!! $store->avatar ? $store->avatar : 'assets/img/team/01.jpg'!!}" alt=""></a>
                                </div>
                                <div class="col-sm-9 product-description">
                                    <div class="overflow-h margin-bottom-5">
                                        <ul class="list-inline overflow-h">
                                            <li><h1 class="title-price"><a href="{{route('profile',
                                            ['account' => $store->accountName])}}">
                                                        {{$store->storename}}</a></h1></li>
                                        </ul>
                                        <p class="margin-bottom-20">
                                            {{$store->address}}
                                        </p>
                                        <p class="margin-bottom-20">
                                            {{$store->phonenumber}}
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div><!--/end filter resilts-->

                {!! $listHMS->render() !!}<!--/end pagination-->
            </div>
        </div><!--/end row-->
    </div><!--/end container-->
    <!--=== End Content Part ===-->
@endsection