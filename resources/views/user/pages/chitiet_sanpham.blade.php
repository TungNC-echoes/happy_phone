@extends('user.layout.index')
@section('content')
    <div class="inner-header">
        <div>
            <div class="pull-left">
                <h6 class="inner-title">Sản phẩm {{$sanpham->name}}</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="/">Trang Chủ</a> / <span>Thông tin chi tiết sản phẩm</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container">
        <div id="content">
            <div class="row">
                <div class="col-sm-9">

                    <div class="row">
                        <div class="col-sm-4">
                            <?php
                            $image_item = $sanpham->image;
                            ?>
                            <img src="{{'../'.$image_item}}" alt="">
                        </div>
                        <div class="col-sm-8">
                            <div class="single-item-body">
                                <h2>{{$sanpham->name}}</h2><br>
                                @if($sanpham->sale!=0)
                                    <p class="single-item-price">
                                        <span class="flash-del">{{number_format($sanpham->price)}} đồng</span>
                                        <span class="flash-sale">{{number_format($sanpham->price - $sanpham->price*$sanpham->sale/100)}} đồng</span>
                                    </p>
                                @else
                                    <p class="single-item-price">
                                        <span class="flash-sale">{{number_format($sanpham->price)}} đồng</span>
                                    </p>
                                @endif
                            </div>

                            <div class="clearfix"></div>
                            <div class="space20">&nbsp;</div>

                            <div class="single-item-desc">
                                <p>{{$sanpham->description}}</p>
                            </div>
                            <div class="space20">&nbsp;</div>

                            <p>Số lượng:</p>
                            <div class="single-item-options">
                                <select class="wc-select" name="color">
                                    <option>Số lượng</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="space40">&nbsp;</div>
                    <div class="woocommerce-tabs">
                        <ul class="tabs">
                            <li><a href="#tab-description">Mô tả</a></li>
                            <li><a href="#tab-reviews">Reviews (0)</a></li>
                        </ul>

                        <div class="panel" id="tab-description">
                            {{$sanpham->description}}
                        </div>
                    </div>
                    <div class="space50">&nbsp;</div>
                    <div class="beta-products-list">
                        <h4>Sản phẩm tương tự</h4>

                        <div class="row">
                            @foreach($sp_tuongtu as $sptt)
                                <div class="col-sm-4">

                                    <div class="single-item">
                                        @if(!empty($sptt->price))
                                            <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                        @endif

                                        <div class="single-item-header">
                                            <?php
                                            $image = $sptt->image;
                                            ?>
                                            <a href="{{route('chitietsanpham', $sptt->id)}}"><img src="{{'../'.$image}}" height="150px" width="150px" alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$sptt->name}}</p>
                                            @if(!empty($sptt->sale))
                                                <p class="single-item-price">
                                                    <span class="flash-del">{{number_format($sptt->price)}} đồng</span>
                                                    <span class="flash-sale">{{number_format($sptt->price - $sptt->price*$sptt->sale/100)}} đồng</span>
                                                </p>
                                            @else
                                                <p class="single-item-price">
                                                    <span class="flash-sale">{{number_format($sptt->price)}} đồng</span>
                                                </p>
                                                    <br>
                                            @endif
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="#"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="{{route('chitietsanpham', $sptt->id)}}">Details <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">{{$sp_tuongtu->links()}}</div>
                    </div> <!-- .beta-products-list -->
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                    Xem Thêm ...
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">{{$sanpham->name}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    {{--<span aria-hidden="true">&times;</span>--}}
                                </button>
                            </div>
                            <div class="modal-body">
                                {{$sanpham->detail}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-sm-3 aside">
                    <div class="widget">
                        <h3 class="widget-title">Best Sellers</h3>
                        <div class="widget-body">
                            <div class="beta-sales beta-lists">
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/1.png" alt=""></a>
                                    <div class="media-body">
                                        Sample Woman Top
                                        <span class="beta-sales-price">$34.55</span>
                                    </div>
                                </div>
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/2.png" alt=""></a>
                                    <div class="media-body">
                                        Sample Woman Top
                                        <span class="beta-sales-price">$34.55</span>
                                    </div>
                                </div>
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/3.png" alt=""></a>
                                    <div class="media-body">
                                        Sample Woman Top
                                        <span class="beta-sales-price">$34.55</span>
                                    </div>
                                </div>
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/4.png" alt=""></a>
                                    <div class="media-body">
                                        Sample Woman Top
                                        <span class="beta-sales-price">$34.55</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- best sellers widget -->
                    <div class="widget">
                        <h3 class="widget-title">New Products</h3>
                        <div class="widget-body">
                            <div class="beta-sales beta-lists">
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/1.png" alt=""></a>
                                    <div class="media-body">
                                        Sample Woman Top
                                        <span class="beta-sales-price">$34.55</span>
                                    </div>
                                </div>
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/2.png" alt=""></a>
                                    <div class="media-body">
                                        Sample Woman Top
                                        <span class="beta-sales-price">$34.55</span>
                                    </div>
                                </div>
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/3.png" alt=""></a>
                                    <div class="media-body">
                                        Sample Woman Top
                                        <span class="beta-sales-price">$34.55</span>
                                    </div>
                                </div>
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/4.png" alt=""></a>
                                    <div class="media-body">
                                        Sample Woman Top
                                        <span class="beta-sales-price">$34.55</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- best sellers widget -->
                </div>
            </div>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection()
