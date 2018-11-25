@extends('backend.layout.index', ['actor' => $actor, 'menu' => 0])
@section('content')
    <div class="content-title">
        Cập nhật thông tin cá nhân
    </div>
    <form action="{{ route('action_update_user_info')}}" method="post" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <div class="new-report new-excercise">
            <div class="base-input">
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Họ và tên
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="name" class="input" value="{{ $user->name }}" required>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Email
                    </div>
                    <div class="col-md-9">
                        <input type="email" name="email" class="input" value="{{ $user->email }}" disabled>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Giới tính
                    </div>
                    <div class="col-md-9">
                        <input type="radio" name="gender" value="1" @if ($user->gender == 1) checked @endif required> Nam
                        <input type="radio" name="gender" value="0" @if ($user->gender == 0) checked @endif  required> Nữ
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Năm sinh
                    </div>
                    <div class="col-md-9">
                        <input type="number" name="year_of_birth" class="input" value="{{ $user->year_of_birth }}" required>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Địa chỉ
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="address" class="input" value="{{ $user->address }}" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-submit-bottom" style="margin-top: 15px">Lưu</button>
        </div>
    </form>
@endsection
