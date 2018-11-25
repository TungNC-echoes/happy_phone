@extends('backend.layout.index', ['actor' => 'coach', 'menu' => 5])
@section('content')
    <div class="content-title">
        Danh sách bài tập
    </div>
    <div class="col-md-8">
        <a href="{{ route('coach_show_create_excercise') }}" class="btn button-add">Thêm bài tập</a>
    </div>
    <div class="col-md-4">
        <form action="{{ route('coach_excercise_search') }}">
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
                <th>Ngày đăng</th>
                <th>Tiêu đề</th>
                <th>Ảnh mô tả</th>
                <th>Mô tả</th>
                <th>Thể loại</th>
                <th>Link</th>
                <th>Xem chi tiết</th>
            </tr>
            @foreach ($excercises as $excercise)
                <tr>
                    <td>
                        {{ date('d/m/Y', strtotime($excercise->created_at)) }}
                    </td>
                    <td>
                        {{ str_limit($excercise->title, $limit = 25, $end = '...') }}
                    </td>
                    <td>
                        <img width="100px" src="{{ $excercise->image }}" alt="{{ str_limit($excercise->title, $limit = 25, $end = '...') }}">
                    </td>
                    <td>
                        {{ str_limit($excercise->description, $limit = 25, $end = '...') }}
                    </td>
                    <td>
                        {{ $excercise->category_id }}
                    </td>
                    <td>
                        {{ str_limit($excercise->video_link, $limit = 25, $end = '...') }}
                    </td>
                    <td>
                        <a href="{{ route('show_excercise_detail', ['excercise_id' => $excercise->id]) }}" target="_blank">
                            Xem chi tiết
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $excercises->links() }}
    </div>
@endsection
