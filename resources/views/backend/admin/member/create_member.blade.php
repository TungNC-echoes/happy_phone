@extends('backend.layout.index', ['actor' => 'admin', 'menu' => 1])
@section('content')
    <div class="content-title">
        Thêm mới thành viên
    </div>
    <form action="{{ route('action_create_member') }}" method="post" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <div class="new-report new-excercise">
            <div class="base-input">
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Họ và tên
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="name" class="input" required>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Email
                    </div>
                    <div class="col-md-9">
                        <input type="email" name="email" class="input" required>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Mật khẩu
                    </div>
                    <div class="col-md-9">
                        <input type="password" name="password" class="input" required>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Giới tính
                    </div>
                    <div class="col-md-9">
                        <input type="radio" name="gender" value="1" checked required> Nam
                        <input type="radio" name="gender" value="0" required> Nữ
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Năm sinh
                    </div>
                    <div class="col-md-9">
                        <input type="number" name="year_of_birth" class="input" required>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Địa chỉ
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="address" class="input" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-submit-bottom" style="margin-top: 15px">Lưu</button>
        </div>
    </form>
@endsection
