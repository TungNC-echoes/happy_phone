@extends('backend.layout.index', ['actor' => 'member', 'menu' => 3])
@section('content')
    <div class="content-title">
        Nội dung chi tiết đánh giá kết quả
    </div>
    <div class="report-content">
        <table>
            <tr>
                <th>Mục</th>
                <th>Nội dung</th>
            </tr>
            <tr>
                <td>
                    Ngày báo cáo
                </td>
                <td>
                    {{ date('d/m/Y', strtotime($review->created_at)) }}
                </td>
            </tr>
            <tr>
                <td>
                    Tiêu đề
                </td>
                <td>
                    {{ $review->title }}
                </td>
            </tr>
            <tr>
                <td>
                    Thành viên
                </td>
                <td>
                    {{ $review->member->name }}
                </td>
            </tr>
            <tr>
                <td>
                    Kết quả
                </td>
                <td>
                    {{ $review->result }}
                </td>
            </tr>
            <tr>
                <td>
                    Nội dung
                </td>
                <td>
                    {{ $review->content }}
                </td>
            </tr>
        </table>
    </div>
@endsection
