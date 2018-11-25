<div class="left-menu col-md-3">
    <div class="col-md-11">
        <ul>
            @if ($actor == 'member')
                <div class="menu">
                    <a href="{{ route('member_home') }}">
                        <li @if(!isset($menu) || $menu == 1) class="active" @endif>
                            Lịch tập luyện
                        </li>
                    </a>
                    <a  href="{{ route('member_report') }}">
                        <li @if($menu == '2') class="active" @endif>
                            Báo cáo hàng tuần
                        </li>
                    </a>
                    <a href="{{ route('member_review') }}">
                        <li @if($menu == '3') class="active" @endif>
                            Nhận xét
                        </li>
                    </a>
                </div>
            @elseif ($actor == 'coach')
                <div class="menu">
                    <a href="{{ route('coach_home') }}">
                        <li @if(!isset($menu) || $menu == 1) class="active" @endif>
                            Lịch làm việc
                        </li>
                    </a>
                    <a href="{{ route('coach_report_list') }}">
                        <li @if($menu == 2) class="active" @endif>
                            Xem báo cáo
                        </li>
                    </a>
                    <a href="{{ route('coach_member_list') }}">
                        <li @if($menu == 3) class="active" @endif>
                            Danh sách thành viên
                        </li>
                    </a>
                    <a href="{{ route('coach_review_list') }}">
                        <li @if($menu == 4) class="active" @endif>
                            Đánh giá kết quả
                        </li>
                    </a>
                    <a href="{{ route('coach_excercise_list') }}">
                        <li @if($menu == 5) class="active" @endif>
                            Quản lý bài tập
                        </li>
                    </a>
                </div>
            @elseif ($actor == 'admin')
                <div class="menu">
                    <a href="{{ route('admin_dashboard') }}">
                        <li @if(!isset($menu) || $menu == 1) class="active" @endif">
                            QL thành viên
                        </li>
                    </a>
                    <a href="{{ route('admin_coach_list') }}">
                        <li @if($menu == 2) class="active" @endif>
                            QL huấn luyện viên
                        </li>
                    </a>
                    <a href="{{ route('admin_excercise_list') }}">
                        <li @if($menu == 3) class="active" @endif>
                            QL bài tập
                        </li>
                    </a>
                    <a href="{{ route('admin_post_list') }}">
                        <li @if($menu == 4) class="active" @endif>
                            QL bài viết
                        </li>
                    </a>
                    <a href="{{ route('admin_music_list') }}">
                        <li @if($menu == 5) class="active" @endif>
                            QL nhạc
                        </li>
                    </a>
                    <a href="{{ route('admin_image_system_list') }}">
                        <li @if($menu == 6) class="active" @endif>
                            QL logo/ảnh
                        </li>
                    </a>
                    <a href="{{ route('admin_system_infos') }}">
                        <li @if($menu == 7) class="active" @endif>
                            QL thông tin hệ thống
                        </li>
                    </a>
                </div>
            @endif
        </ul>
    </div>
</div>