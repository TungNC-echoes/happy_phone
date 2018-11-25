@extends('backend.layout.index', ['actor' => 'admin', 'menu' => 6])
@section('content')
    <div class="content-title">
        Danh sách ảnh hệ thống
    </div>
    <div class="report-content">
        <table>
            <tr>
                <th>label</th>
                <th>Ảnh</th>
                <th>Mô tả cho ảnh</th>
                <th>Sửa</th>
            </tr>
            @foreach ($images as $image)
                <tr>
                    <td>
                        {{ $image->label }}
                    </td>
                    <td>
                        <img width="400px" src="{{ $image->url }}" style="margin: 20px 20px">
                    </td>
                    <td>
                        {{ $image->alt }}
                    </td>
                    <td>
                        <a href="{{ route('admin_show_update_image', ['image_id' => $image->id]) }}"><span class="fa fa-edit"></span></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
