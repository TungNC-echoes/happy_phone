<div class="header col-md-12">
    <div class="header-line">
        <a href="" title="Về trang chủ">
            <div class="logo-area col-md-3">
                <img src="backend/images/logo.png" alt="Logo">
            </div>
        </a>
        <div class="header-title col-md-7">
            <span href="{{ route('member_home') }}">
                @if ($actor == 'member')
                    Góc thành viên
                @elseif ($actor == 'coach')
                    Góc huấn luyện viên
                @else
                    Góc quản trị viên
                @endif
            </span>
        </div>
        <div class="header-menu-right col-md-2">
            <a href="{{ route('login') }}" class="hidden"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng nhập</a>
            <div class="dropdown">
						<span class="dropdown-toggle btn" data-toggle="dropdown">
							{{ Auth::user()->name }}
							<i class="fa fa-caret-down" aria-hidden="true"></i>
						</span>
                <ul class="dropdown-menu">
                    <li><a href="/">Về trang chủ</a></li>
                    <li><a href="{{ route('profile_show') }}">Quản lý tài khoản</a></li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>