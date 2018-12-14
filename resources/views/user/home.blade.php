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
                            <h4>Sản Phẩm Mới</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm được {{count($new_products)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row fa-border item-phone" style="margin-right: 0px !important">
                                @foreach($new_products as $new_product)
                                    <div class="col-sm-3 col3-phone">
                                        <div class="single-item">
                                            @if(!empty($new_product->sale))
                                                <div class="ribbon-wrapper"><div class="ribbon sale">SALE</div></div>
                                            @endif
                                            <div class="single-item-header">
                                                <a href="{{route('chitietsanpham', $new_product->id)}}"><img style="width: 173px; height: 205px" src="{{$new_product->image}}" alt=""></a>
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
                                                    <br>
                                                @endif
                                            </div>
                                            <div class="single-item-caption ">
                                                <a class="add-to-cart pull-left" href="#"><i class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="{{route('chitietsanpham', $new_product->id)}}">Details <i class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">{{$new_products->links()}}</div>
                        </div> <!-- .beta-products-list -->

                        <div class="beta-products-list">
                            <h4>Sản Phẩm Khuyến Mại</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm được {{count($sale_products)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row fa-border item-phone" style="margin-right: 0px !important">
                                @foreach($sale_products as $sale_product)
                                    <div class="col-sm-3" style="width: 224px; height: 360px">
                                        <div class="single-item">
                                            @if(!empty($sale_product->sale))
                                                <div class="ribbon-wrapper"><div class="ribbon sale">SALE</div></div>
                                            @endif
                                            <div class="single-item-header">
                                                <a href="{{route('chitietsanpham', $sale_product->id)}}"><img style="width: 173px; height: 205px" src="{{$sale_product->image}}" alt=""></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$sale_product->name}}</p>
                                                @if(!empty($sale_product->sale))
                                                    <p class="single-item-price">
                                                        <span class="flash-del">{{number_format($sale_product->price)}} đồng</span>
                                                        <span class="flash-sale">{{number_format($sale_product->price - $sale_product->price*$sale_product->sale/100)}} đồng</span>
                                                    </p>
                                                @else
                                                    <p class="single-item-price">
                                                        <span class="flash-sale">{{number_format($sale_product->price)}} đồng</span>
                                                    </p>
                                                @endif
                                            </div>
                                            <div class="single-item-caption ">
                                                <a class="add-to-cart pull-left" href="#"><i class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="{{route('chitietsanpham', $sale_product->id)}}">Details <i class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">{{$sale_products->links()}}</div>
                        </div> <!-- .beta-products-list -->

                        <div class="space50">&nbsp;</div>
                    </div>
                </div> <!-- end section with sidebar and main content -->

            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection