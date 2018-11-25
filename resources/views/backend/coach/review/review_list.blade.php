@extends('backend.layout.index', ['actor' => 'coach', 'menu' => 4])
@section('content')
    <div class="content-title">
        Danh sách đánh giá đã gửi
    </div>
    <div class="col-md-8"></div>
    <div class="col-md-4">
        <form action="{{ route('coach_review_search') }}">
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
                <th>Thành viên</th>
                <th>Kết quả</th>
                <th>Xem chi tiết</th>
            </tr>
            @foreach ($reviews as $review)
                <tr>
                    <td>
                        {{ date('d/m/Y', strtotime($review->created_at)) }}
                    </td>
                    <td>
                        {{ $review->title }}
                    </td>
                    <td>
                        {{ $review->member->name }}
                    </td>
                    <td>
                        {{ $review->result }}
                    </td>
                    <td>
                        <a href="{{ route('coach_review_show_detail', $review->id) }}">
                            Xem chi tiết
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $reviews->links() }}
    </div>
@endsection
