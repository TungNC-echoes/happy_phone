@extends('backend.layout.index', ['actor' => 'coach', 'menu' => 3])
@section('content')
    <div class="content-title">
        Thông tin member {{ $member->name }}
    </div>
    <div class="report-content">
        <table>
            <tr>
                <th>Mục</th>
                <th>Nội dung</th>
            </tr>
            <tr>
                <td>
                    Họ và tên
                </td>
                <td>
                    {{ $member->name }}
                </td>
            </tr>
            <tr>
                <td>
                    Giới tính
                </td>
                <td>
                    {{ $member->gender ? 'nam' : 'nữ' }}
                </td>
            </tr>
            <tr>
                <td>
                    Năm sinh
                </td>
                <td>
                    {{ $member->year_of_birth }}
                </td>
            </tr>
            <tr>
                <td>
                    Email
                </td>
                <td>
                    {{ $member->email }}
                </td>
            </tr>
            <tr>
                <td>
                    Địa chỉ
                </td>
                <td>
                    {{ $member->address }}
                </td>
            </tr>
        </table>
    </div>
    <br><br>
    <div class="content-title">
        Lịch luyện tập
    </div>
    <div class="col-md-12">
        <a href="{{ route('admin_show_create_member_schedule', ['member_id' => $member->id]) }}" class="btn button-add">Thêm bài tập</a>
    </div>
    <div class="report-content">
        <table>
            <tr>
                <th>Ngày</th>
                <th>Nội dung</th>
                <th>Chú ý</th>
                <th>Bài tập</th>
            </tr>
            @foreach ($member_schedules as $member_schedule)
                <tr>
                    <td>
                        29/11/2017
                    </td>
                    <td>
                        Bài tập ngực
                    </td>
                    <td>
                        Tập đều đặn không quá sức
                    </td>
                    <td>
                        Bài tập ngực dành cho nam
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $member_schedules->links() }}
    </div>
@endsection
