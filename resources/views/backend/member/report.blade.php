@extends('backend.layout.index', ['actor' => 'member', 'menu' => 2])
@section('content')
    <div class="content-title">
        Báo cáo kết quả hàng tuần hàng tuần
    </div>
    <div class="col-md-12">
        <div class="col-md-8">
            <a href="{{ route('member_show_create_report') }}" class="btn button-add">Viết báo cáo</a>
        </div>
        <div class="col-md-4">
            <form action="{{ route('member_report_search') }}">
                <div class="search-area">
                    <input type="search" name="search" placeholder="Tìm kiếm" class="search-input" title="Nhập tiêu đề tìm kiếm" value="{{ isset($search) ? $search : null }}">
                    <span class="button-search"></span>
                    <button type="submit"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="report-content">
        <table>
            <tr>
                <th>Ngày</th>
                <th>Tiêu đề</th>
                <th>Trạng thái</th>
                <th>Review</th>
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
                        <a href="{{ $report->review_id ? route('member_review_show_detail', $report->review_id) : null }}">
                            {{ ($report->status == 1) ? 'Xem đánh giá' : null }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('member_show_report_detail', $report->id) }}">
                            Xem chi tiết
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $reports->links() }}
    </div>
@endsection
