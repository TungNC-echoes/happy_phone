@extends('backend.layout.index', ['actor' => 'admin', 'menu' => 2])
@section('content')
    <div class="content-title">
        Thông tin huấn luyện viên {{ $coach->name }}
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
                    {{ $coach->name }}
                </td>
            </tr>
            <tr>
                <td>
                    Giới tính
                </td>
                <td>
                    {{ $coach->gender ? 'nam' : 'nữ' }}
                </td>
            </tr>
            <tr>
                <td>
                    Năm sinh
                </td>
                <td>
                    {{ $coach->year_of_birth }}
                </td>
            </tr>
            <tr>
                <td>
                    Email
                </td>
                <td>
                    {{ $coach->email }}
                </td>
            </tr>
            <tr>
                <td>
                    Địa chỉ
                </td>
                <td>
                    {{ $coach->address }}
                </td>
            </tr>
        </table>
    </div>
    <br><br>
    <div class="content-title">
        Lịch huấn luyện
    </div>
    <div class="col-md-12">
        <a href="{{ route('admin_show_create_coach_schedule', ['coach_id' => $coach->id]) }}" class="btn button-add">Thêm lịch làm việc</a>
    </div>
    <div class="report-content">
        <table>
            <tr>
                <th>Ngày</th>
                <th>Thời gian</th>
                <th>Công việc</th>
            </tr>
            @foreach ($coach_schedules as $coach_schedule)
                <tr>
                    <td>
                        {{ $coach_schedule->date }}
                    </td>
                    <td>
                        {{ $coach_schedule->start_time }} - {{ $coach_schedule->end_time }}
                    </td>
                    <td>
                        {{ $coach_schedule->work }}
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $coach_schedules->links() }}
    </div>
@endsection
