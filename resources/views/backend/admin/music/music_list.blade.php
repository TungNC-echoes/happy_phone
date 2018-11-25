@extends('backend.layout.index', ['actor' => 'admin', 'menu' => 5])
@section('content')
    <div class="content-title">
        Danh sách nhạc thể hình
    </div>
    <div class="col-md-8">
        <a href="{{ route('admin_show_create_music') }}" class="btn button-add">Thêm nhạc</a>
    </div>
    <div class="col-md-4">
        <form action="{{ route('admin_music_search') }}">
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
                <th>Video link</th>
                <th>Xem chi tiết</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
            @foreach ($musics as $music)
                <tr>
                    <td>
                        {{ date('d/m/Y', strtotime($music->created_at)) }}
                    </td>
                    <td>
                        {{ $music->title }}
                    </td>
                    <td>
                        <img width="100px" src="{{ $music->image }}" alt="{{ $music->title }}">
                    </td>
                    <td>
                        {{ $music->video_link }}
                    </td>
                    <td>
                        <a href="{{ route('show_music_detail', ['music_id' => $music->id]) }}" target="_blank">
                            Xem chi tiết
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin_show_update_music', ['music_id' => $music->id]) }}"><span class="fa fa-edit"></span></a>
                    </td>
                    <td >
                        <a class="delete" style="cursor: pointer"><input type="hidden" class="del_url" value="{{ route('admin_action_delete_music', ['music_id' => $music->id]) }}"><span class="fa fa-remove"></span></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $musics->links() }}
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
