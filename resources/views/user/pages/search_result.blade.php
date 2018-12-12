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
                            <h4>Kết quả tìm kiếm cho từ khóa: {{$key_search}}</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm được {{count($products)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row fa-border item-phone">
                                @foreach($products as $product)
                                    <div class="col-sm-3" style="width: 224px; height: 360px">
                                        <div class="single-item">
                                            @if(!empty($product->sale))
                                                <div class="ribbon-wrapper"><div class="ribbon sale">SALE</div></div>
                                            @endif
                                            <div class="single-item-header">
                                                <a href="#"><img style="width: 173px; height: 205px" src="{{$product->image}}" alt=""></a>
                                            </div>
                                                <div class="single-item-body">
                                                    <p class="single-item-title">{{$product->name}}</p>
                                                    @if(!empty($product->sale))
                                                        <p class="single-item-price">
                                                            <span class="flash-del">{{number_format($product->price)}} đồng</span>
                                                            <span class="flash-sale">{{number_format($product->price - $product->price*$product->sale/100)}} đồng</span>
                                                        </p>
                                                    @else
                                                        <p class="single-item-price">
                                                            <span class="flash-sale">{{number_format($product->price)}} đồng</span>
                                                        </p>
                                                        <br>
                                                    @endif
                                                </div>
                                                <div class="single-item-caption ">
                                                    <a class="add-to-cart pull-left" href="#"><i class="fa fa-shopping-cart"></i></a>
                                                    <a class="beta-btn primary" href="{{route('chitietsanpham', $product->id)}}">Details <i class="fa fa-chevron-right"></i></a>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="row">{{$products->links()}}</div>
                            </div> <!-- .beta-products-list -->
                        </div>
                    </div> <!-- end section with sidebar and main content -->

                </div> <!-- .main-content -->
            </div> <!-- #content -->
        </div> <!-- .container -->
@endsection