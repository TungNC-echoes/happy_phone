@extends('backend.layout.index', ['actor' => 'admin', 'menu' => 7])
@section('content')
    <div class="content-title">
        Danh sách thông tin hệ thống
    </div>
    <div class="report-content">
        <table>
            <tr>
                <th>Label</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Link</th>
                <th>Sửa</th>
            </tr>
            @foreach ($web_infos as $web_info)
                <tr>
                    <td>
                        {{ $web_info->label }}
                    </td>
                    <td>
                        {{ $web_info->title }}
                    </td>
                    <td>
                        {{ $web_info->content }}
                    </td>
                    <td>
                        {{ $web_info->url }}
                    </td>
                    <td>
                        <a href="{{ route('admin_show_update_info', ['info_id' => $web_info->id]) }}"><span class="fa fa-edit"></span></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
