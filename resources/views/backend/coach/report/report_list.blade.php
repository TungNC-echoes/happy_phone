@extends('backend.layout.index', ['actor' => 'coach', 'menu' => 2])
@section('content')
    <div class="content-title">
        Danh sách báo cáo hàng tuần
    </div>
    <div class="col-md-8"></div>
    <div class="col-md-4">
        <form action="{{ route('coach_report_seach') }}">
            <div class="search-area">
                <input type="search" name="search" placeholder="Tìm kiếm" class="search-input" title="Nhập tiêu đề tìm kiếm" value="{{ isset($search) ? $search : null }}">
                <span class="button-search"></span>
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
    <div class="report-content">
        <table>
            <tr>
                <th>Ngày gửi</th>
                <th>Tiêu đề</th>
                <th>Trạng thái</th>
                <th>Thành viên</th>
                <th>Xem chi tiết</th>
            </tr>
            @foreach ($reports as $report)
                <tr>
                    <td>
                        {{ date('d/m/Y', strtotime($report->created_at)) }}
                    </td>
                    <td>
                        {{ $report->title }}
                    </td>
                    <td>
                        {{ ($report->status == 0) ? 'Chưa trả lời' : 'Đã trả lời' }}
                    </td>
                    <td>
                        {{ $report->member->name }}
                    </td>
                    <td>
                        <a href="{{ route('coach_show_report_detail', $report->id) }}">
                            Xem chi tiết
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $reports->links() }}
    </div>
@endsection
