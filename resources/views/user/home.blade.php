@extends('user.layout.index')
@section('content')
    @include('user.layout.slide')
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4>Sản Phẩm Khuyến Mại</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm được {{count($new_products)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row fa-border item-phone">
                                @foreach($new_products as $new_product)
                                    <div class="col-sm-3" style="width: 224px; height: 360px">
                                        <div class="single-item">
                                            @if(!empty($new_product->sale))
                                                <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                            @endif
                                            <div class="single-item-header">
                                                <a href="#"><img style="width: 173px; height: 205px" src="{{$new_product->image}}" alt=""></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$new_product->name}}</p>
                                                @if(!empty($new_product->sale))
                                                    <p class="single-item-price">
                                                        <span class="flash-del">{{number_format($new_product->price)}} đồng</span>
                                                        <span class="flash-sale">{{number_format($new_product->price - $new_product->price*$new_product->sale/100)}} đồng</span>
                                                    </p>
                                                @else
                                                    <p class="single-item-price">
                                                        <span class="flash-sale">{{number_format($new_product->price)}} đồng</span>
                                                    </p>
                                                @endif
                                            </div>
                                            <div class="single-item-caption ">
                                                <a class="add-to-cart pull-left" href="#"><i class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="#">Details <i class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">{{$new_products->links()}}</div>
                        </div> <!-- .beta-products-list -->

                        <div class="space50">&nbsp;</div>

                        {{--<div class="beta-products-list">--}}
                            {{--<h4>Sản Phẩm Khuyến Mại</h4>--}}
                            {{--<div class="beta-products-details">--}}
                                {{--<p class="pull-left">Tìm thấy {{count($promotion_products)}} sản phẩm</p>--}}
                                {{--<div class="clearfix"></div>--}}
                            {{--</div>--}}
                            {{--<div class="row">--}}
                                {{--@foreach($promotion_products as $promotion_product)--}}
                                    {{--<div class="col-sm-3" style="width: 280px; height: 450px">--}}
                                        {{--<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>--}}
                                        {{--<div class="single-item">--}}
                                            {{--<div class="single-item-header">--}}
                                                {{--<a href="{{route('chitietsanpham', $promotion_product->id)}}"><img style="width: 270px; height: 320px" src="source/image/product/{{$promotion_product->image}}" alt=""></a>--}}
                                            {{--</div>--}}
                                            {{--<div class="single-item-body">--}}
                                                {{--<p class="single-item-title">{{$promotion_product->name}}</p>--}}
                                                {{--<p class="single-item-price">--}}
                                                    {{--<span class="flash-del">{{number_format($promotion_product->unit_price)}} đồng</span>--}}
                                                    {{--<span class="flash-sale">{{number_format($promotion_product->promotion_price)}} đồng</span>--}}
                                                {{--</p>--}}
                                            {{--</div>--}}
                                            {{--<div class="single-item-caption">--}}
                                                {{--<a class="add-to-cart pull-left" href="{{route('themgiohang', $promotion_product->id)}}"><i class="fa fa-shopping-cart"></i></a>--}}
                                                {{--<a class="beta-btn primary" href="{{route('chitietsanpham', $promotion_product->id)}}">Details <i class="fa fa-chevron-right"></i></a>--}}
                                                {{--<div class="clearfix"></div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--@endforeach--}}
                            {{--</div>--}}
                            {{--<div class="row">{{$promotion_products->links()}}</div>--}}
                            {{--<div class="space40">&nbsp;</div>--}}
                            {{--<div class="row">--}}

                            {{--</div>--}}
                        {{--</div> <!-- .beta-products-list -->--}}
                    </div>
                </div> <!-- end section with sidebar and main content -->


            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection