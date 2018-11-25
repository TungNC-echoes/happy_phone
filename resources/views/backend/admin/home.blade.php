@extends('backend.layout.index', ['actor' => 'admin', 'menu' => 1])
@section('content')
    <div class="content-title">
        Danh sách thành viên
    </div>
    <div class="col-md-8">
        <a href="{{ route('admin_show_create_member') }}" class="btn button-add">Thêm member</a>
    </div>
    <div class="col-md-4">
        <form action="{{ route('admin_member_search') }}">
            <div class="search-area">
                <input type="search" name="search" placeholder="Tìm kiếm" class="search-input" title="Nhập tên thành viên" value="{{ isset($search) ? $search : null }}">
                <span class="button-search"></span>
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
    <div class="report-content">
        <table>
            <tr>
                <th>Họ và tên</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Xem chi tiết</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
            @foreach ($members as $member)
                <tr>
                    <td>
                        {{ $member->name }}
                    </td>
                    <td>
                        {{ $member->gender ? 'nam' : 'nữ'  }}
                    </td>
                    <td>
                        {{ $member->year_of_birth }}
                    </td>
                    <td>
                        {{ $member->email }}
                    </td>
                    <td>
                        {{ $member->address }}
                    </td>
                    <td>
                        <a href="{{ route('admin_show_member_detail', ['member_id' => $member->id]) }}">
                            Xem chi tiết
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin_show_update_member', ['member_id' => $member->id]) }}"><span class="fa fa-edit"></span></a>
                    </td>
                    <td >
                        <a class="delete" style="cursor: pointer"><input type="hidden" class="del_url" value="{{ route('admin_action_delete_member', ['member_id' => $member->id]) }}"><span class="fa fa-remove"></span></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $members->links() }}
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
