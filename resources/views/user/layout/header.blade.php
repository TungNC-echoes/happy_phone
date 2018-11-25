<div class="header">
    <div class="header-top">
        <div class="social">
            <a href="{{ $youtube->url }}" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
            <a href="{{ $fanpage->url }}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        </div>
        <div class="right-menu-top">
            @if (Auth::guest())
                <a href="{{ route('login') }}" style="color: #fff"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng nhập</a>
                <a href="{{ route('register') }}" style="color: #fff"><i class="fa fa-user-plus" aria-hidden="true"></i>Đăng kí</a>
            @else
                <div class="dropdown">
                            <span class="dropdown-toggle btn" data-toggle="dropdown">
                                {{ Auth::user()->name }}
                                <i class="fa fa-caret-down" aria-hidden="true"></i>
                            </span>
                    <ul class="dropdown-menu">
                        <li>
                            @if (Auth::user()->level == 1)
                                <a href="{{ route('admin_dashboard') }}">
                                    Góc quản trị viên
                                </a>
                            @elseif (Auth::user()->level == 2)
                                <a href="{{ route('coach_home') }}">
                                    Góc huấn luyện viên
                                </a>
                            @else
                                <a href="{{ route('member_home') }}">
                                    Góc thành viên
                                </a>
                            @endif
                        </li>
                        <li><a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Đăng xuất
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <div class="header-logo">
        <div class="col-md-2">
            <a href="/">
                <img src="{{ $logo->url }}" alt="{{ $logo->alt }}" class="logo">
            </a>
        </div>
        <div class="col-md-10">
            <form action="{{ route('search_title') }}" method="get">
                <div class="search">
                    <input type="text" name="search_input" placeholder="Tìm kiếm" class="input-search" title="Nhập tên bài tập, bài viết, nhạc ..." required>
                    <button type="submit" class="button-search">
                        Tìm kiếm <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-12 header-nav">
        <ul>
            <li class="item @if (!isset($content)) active @endif"><a href="/">Trang chủ</a></li>
            @foreach ($root_categories as $root_category)
                <li class="item @if (isset($content) && $root_category->id == $content->id) active @endif"><a href="{{ route('content', ['category' => $root_category->id]) }}">{{ $root_category->title }}</a></li>
            @endforeach
        </ul>
    </div>
</div>