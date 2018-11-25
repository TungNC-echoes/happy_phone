@extends('backend.layout.index', ['actor' => 'coach', 'menu' => 1])
@section('content')
    <div class="content-title">
        Lịch làm việc cá nhân
    </div>
    <div class="col-md-8"></div>
    <div class="col-md-4">
        <div class="search-area">
            <input type="search" placeholder="Tìm kiếm" class="search-input">
            <span class="button-search"></span>
            <button><i class="fa fa-search"></i></button>
        </div>
    </div>
    <div class="report-content">
        <table>
            <tr>
                <th>Ngày</th>
                <th>Thời gian</th>
                <th>Công việc</th>
            </tr>
            @foreach ($schedules as $schedule)
                <tr>
                    <td>
                        {{ $schedule->date }}
                    </td>
                    <td>
                        {{ $schedule->start_time }} - {{ $schedule->end_time }}
                    </td>
                    <td>
                        {{ $schedule->work }}
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $schedules->links() }}
    </div>
@endsection
