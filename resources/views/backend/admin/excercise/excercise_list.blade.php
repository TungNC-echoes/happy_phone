@extends('backend.layout.index', ['actor' => 'admin', 'menu' => 3])
@section('content')
    <div class="content-title">
        Danh sách bài tập
    </div>
    <div class="col-md-8">
        <a href="{{ route('admin_show_create_excercise') }}" class="btn button-add">Thêm bài tập</a>
    </div>
    <div class="col-md-4">
        <form action="{{ route('admin_excercise_search') }}">
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
                <th>Thể loại</th>
                <th>Mô tả</th>
                <th>Link</th>
                <th>Xem chi tiết</th>
                <th>Sửa</th>
                <th>Xóa</th>
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
                        {{ $excercise->category->title }}
                    </td>
                    <td>
                        {{ str_limit($excercise->video_link, $limit = 25, $end = '...') }}
                    </td>
                    <td>
                        <a href="{{ route('show_excercise_detail', ['excercise_id' => $excercise->id]) }}" target="_blank">
                            Xem chi tiết
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin_show_update_excercise', ['excercise_id' => $excercise->id]) }}"><span class="fa fa-edit"></span></a>
                    </td>
                    <td >
                        <a class="delete" style="cursor: pointer"><input type="hidden" class="del_url" value="{{ route('admin_delete_excercise', ['excercise_id' => $excercise->id]) }}"><span class="fa fa-remove"></span></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $excercises->links() }}
    </div>
    <script>
        $('.delete').on('click', function () {
            var del_url = $(this).find('.del_url').val();
            if (confirm("Bạn có chắc chắn muốn xóa ?") == true) {
                $(this).attr('href', del_url);
            }
        });
    </script>
@endsection
