@extends('user.layout.index')
@section('content')
    @include('user.layout.slide')
    <div class="content">
        <div id="man" class="child-content">
            <input type="hidden" class="category_id" value="new">
            <div class="block-tile">
                <a href="#">
                    <div class="title">
                        New Phone
                    </div>
                </a>
                <div class="sub-content-list">
                    @foreach ($products_iphone as $product_iphone)
                        <a><input type="hidden" class="cate_tab_id" value="{{ $product_iphone->id }}">{{ $product_iphone->name }}</a>
                        <div class="description">{{$product_iphone->price}}</div>
                    @endforeach
                </div>
                <div class="sub-content-list">
                    <a class="active"><input type="hidden" class="cate_tab_id" value="">Tất cả</a>
                </div>
            </div>
            <div class="block-content">
                @foreach ($products_iphone as $product_iphone)
                    <a href="#">
                        <div class="block-video col-md-3">
                            <div class="video">
                                <img src="{{ $product_iphone->image }}" style="width: 210px; height: 300px;">
                            </div>
                            <div class="description">
                                {{ str_limit($product_iphone->title, $limit = 50, $end = '...') }}
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="block-pagination">
                {{ $products_iphone->links() }}
            </div>
        </div>
        <div id="woman" class="child-content">

        </div>
        <div id="woman" class="child-content">

        </div>
        <div id="woman" class="child-content">

        </div>
    </div>
@endsection