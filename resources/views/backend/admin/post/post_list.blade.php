@extends('backend.layout.index', ['actor' => 'admin', 'menu' => 4])
@section('content')
    <div class="content-title">
        Danh sách bài viết
    </div>
    <div class="col-md-8">
        <a href="{{ route('admin_show_create_post') }}" class="btn button-add">Thêm bài viết</a>
    </div>
    <div class="col-md-4">
        <form action="{{ route('admin_post_search') }}">
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
                <th>Xem chi tiết</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
            @foreach ($posts as $post)
                <tr>
                    <td>
                        {{ date('d/m/Y', strtotime($post->created_at)) }}
                    </td>
                    <td>
                        {{ $post->title }}
                    </td>
                    <td>
                        <img width="100px" src="{{ $post->image }}" alt="{{ $post->title }}">
                    </td>
                    <td>
                        {{ $post->title }}
                    </td>
                    <td>
                        <a href="http://fitness.dev/">
                            Xem chi tiết
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin_show_update_post', ['post' => $post->id]) }}"><span class="fa fa-edit"></span></a>
                    </td>
                    <td>
                        <a class="delete" style="cursor: pointer"><input type="hidden" class="del_url" value="{{ route('admin_action_delete_post', ['post_id' => $post->id]) }}"><span class="fa fa-remove"></span></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $posts->links() }}
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
