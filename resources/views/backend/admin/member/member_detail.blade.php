@extends('backend.layout.index', ['actor' => 'admin', 'menu' => 1])
@section('content')
    <div class="content-title">
        Thông tin member {{ $member->name }}
    </div>
    <div class="report-content">
        <table>
            <tr>
                <th>Mục</th>
                <th>Nội dung</th>
            </tr>
            <tr>
                <td>
                    Họ và tên
                </td>
                <td>
                    {{ $member->name }}
                </td>
            </tr>
            <tr>
                <td>
                    Giới tính
                </td>
                <td>
                    {{ $member->gender ? 'nam' : 'nữ'  }}
                </td>
            </tr>
            <tr>
                <td>
                    Năm sinh
                </td>
                <td>
                    {{ $member->year_of_birth }}
                </td>
            </tr>
            <tr>
                <td>
                    Email
                </td>
                <td>
                    {{ $member->email }}
                </td>
            </tr>
            <tr>
                <td>
                    Địa chỉ
                </td>
                <td>
                    {{ $member->address }}
                </td>
            </tr>
        </table>
    </div>
@endsection
