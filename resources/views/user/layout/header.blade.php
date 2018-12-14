<div class="header">
    <div class="header-top">
        <div>
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href=""><i class="fa fa-home"></i> Số 7, Ngách 44, Ngõ 127, Phùng Khoang, Từ Liêm, Hà Nội</a></li>
                    <li><a href=""><i class="fa fa-phone"></i> 0357 831 525</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    <li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li>
                    @if(Auth::check())
                        <li><a href="#">Chào bạn {{Auth::user()->name}}</a></li>
                        <li><a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">Đăng xuất
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form></li>

                    @else
                        <li><a href="{{route('signin')}}">Đăng kí</a></li>
                        <li><a href="{{route('login')}}">Đăng nhập</a></li>
                    @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="beta-relative">
            <div class="pull-left">
                <a href="/" id="logo"><img src="{{asset('user/images/phone.png')}}" width="200px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="col-md-12">
                    <form action="{{ route('search') }}" method="get">
                        <div class="search">
                            <input type="text" name="search_input" placeholder="Tìm kiếm" class="input-search" title="Nhập tên bài tập, bài viết, nhạc ..." required>
                            <button type="submit" class="button-search">
                                Tìm kiếm <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="beta-comp">
                    @if(Session::has('cart'))
                        <div class="cart">
                            <div class="beta-select"><i class="fa fa-shopping-cart">

                                </i> Giỏ hàng ({{Session('cart')->totalQty}}) <i class="fa fa-chevron-down"></i></div>
                            <div class="beta-dropdown cart-body">
                                @foreach($product_cart as $product)
                                    <div class="cart-item">
                                        <a href="{{route('xoagiohang', $product['item']['id'])}}" class="cart-item-delete"><i class="fa fa-times"></i></a>
                                        <div class="media">
                                            <a class="pull-left" href="#"><img src="source/image/product/{{$product['item']['image']}}" alt=""></a>
                                            <div class="media-body">
                                                <span class="cart-item-title">{{$product['item']['name']}}</span>
                                                <span class="cart-item-amount">{{$product['qty']}}*<span>
                                                        @if($product['item']['promotion_price'] == 0){{number_format($product['item']['unit_price'])}}
                                                        @else {{number_format($product['item']['promotion_price'])}}
                                                        @endif
                                                    </span></span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="cart-caption">
                                    <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{Session('cart')->totalPrice}}</span></div>
                                    <div class="clearfix"></div>

                                    <div class="center">
                                        <div class="space10">&nbsp;</div>
                                        <a href="{{route('dathang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .cart -->
                    @endif
                </div>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="/">Trang chủ</a></li>
                    <li><a href="#">Sản phẩm</a>
                        {{--<ul class="sub-menu">--}}
                            {{--@foreach($loai_sp as $loai)--}}
                                {{--<li><a href="{{route('loaisanpham', $loai->id)}}">{{$loai->name}}</a></li>--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                    </li>
                    <li><a href="{{route('gioithieu')}}">Giới thiệu</a></li>
                    <li><a href="{{route('lienhe')}}">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
    {{--<div class="header-top">--}}
        {{--<div class="social">--}}
            {{--<a href="#" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>--}}
            {{--<a href="#" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>--}}
        {{--</div>--}}
        {{--<div class="right-menu-top">--}}
            {{--@if (Auth::guest())--}}
                {{--<a href="{{ route('login') }}" style="color: #fff"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng nhập</a>--}}
                {{--<a href="{{ route('register') }}" style="color: #fff"><i class="fa fa-user-plus" aria-hidden="true"></i>Đăng kí</a>--}}
            {{--@else--}}
                {{--<div class="dropdown">--}}
                            {{--<span class="dropdown-toggle btn" data-toggle="dropdown">--}}
                                {{--{{ Auth::user()->name }}--}}
                                {{--<i class="fa fa-caret-down" aria-hidden="true"></i>--}}
                            {{--</span>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li>--}}
                            {{--@if (Auth::user()->level == 1)--}}
                                {{--<a href="{{ route('admin_dashboard') }}">--}}
                                    {{--Góc quản trị viên--}}
                                {{--</a>--}}
                            {{--@elseif (Auth::user()->level == 2)--}}
                                {{--<a href="{{ route('coach_home') }}">--}}
                                    {{--Góc huấn luyện viên--}}
                                {{--</a>--}}
                            {{--@else--}}
                                {{--<a href="{{ route('member_home') }}">--}}
                                    {{--Góc thành viên--}}
                                {{--</a>--}}
                            {{--@endif--}}
                        {{--</li>--}}
                        {{--<li><a href="{{ route('logout') }}"--}}
                               {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                                {{--Đăng xuất--}}
                            {{--</a>--}}
                            {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                                {{--{{ csrf_field() }}--}}
                            {{--</form>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--@endif--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="header-logo">--}}
        {{--<div class="col-md-2">--}}
            {{--<a href="/">--}}
                {{--<img src="{{ $logo->url }}" alt="{{ $logo->alt }}" class="logo">--}}
            {{--</a>--}}
        {{--</div>--}}
        {{--<div class="col-md-10">--}}
            {{--<form action="{{ route('search_title') }}" method="get">--}}
                {{--<div class="search">--}}
                    {{--<input type="text" name="search_input" placeholder="Tìm kiếm" class="input-search" title="Nhập tên bài tập, bài viết, nhạc ..." required>--}}
                    {{--<button type="submit" class="button-search">--}}
                        {{--Tìm kiếm <i class="fa fa-search" aria-hidden="true"></i>--}}
                    {{--</button>--}}
                {{--</div>--}}
            {{--</form>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-12 header-nav">--}}
        {{--<ul>--}}
            {{--<li class="item  active "><a href="/">Trang chủ</a></li>--}}
            {{--<li class="item "><a href="http://fitness.com/content/1">Thể hình nam</a></li>--}}
            {{--<li class="item "><a href="http://fitness.com/content/2">Thể hình nữ</a></li>--}}
            {{--<li class="item "><a href="http://fitness.com/content/3">Bài tập yoga</a></li>--}}
            {{--<li class="item "><a href="http://fitness.com/content/4">Bài viết thể hình</a></li>--}}
            {{--<li class="item "><a href="http://fitness.com/content/5">Nhạc thể hình</a></li>--}}
        {{--</ul>--}}
    {{--</div>--}}
</div>