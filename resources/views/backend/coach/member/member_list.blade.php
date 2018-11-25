@extends('backend.layout.index', ['actor' => 'coach', 'menu' => 3])
@section('content')
    <div class="content-title">
        Danh sách thành viên
    </div>
    <div class="col-md-8"></div>
    <div class="col-md-4">
        <form action="{{ route('coach_member_search') }}">
            <div class="search-area">
                <input type="search" name="search" placeholder="Tìm kiếm" class="search-input" title="Nhập tên thành viên" value="{{ isset($search) ? $search : null }}">
                <span class="button-search"></span>
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
    <div class="report-content">
        <table>
            <tr>
                <th>Họ và tên</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Xem chi tiết</th>
            </tr>
            @foreach ($members as $member)
                <tr>
                    <td>
                        {{ $member->name }}
                    </td>
                    <td>
                        {{ ($member->gender == 1) ? 'nam' : 'nữ'}}
                    </td>
                    <td>
                        {{ $member->year_of_birth }}
                    </td>
                    <td>
                        {{ $member->email }}
                    </td>
                    <td>
                        {{ $member->address }}
                    </td>
                    <td>
                        <a href="{{ route('coach_show_member_detail', ['member_id' => $member->id]) }}">
                            Xem chi tiết
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $members->links() }}
    </div>
@endsection
