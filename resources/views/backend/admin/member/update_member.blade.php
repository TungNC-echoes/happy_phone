@extends('backend.layout.index', ['actor' => 'admin', 'menu' => 1])
@section('content')
    <div class="content-title">
        Cập nhật thông tin thành viên
    </div>
    <form action="{{ route('action_update_member_info', ['member_id' => $member->id]) }}" method="post" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <div class="new-report new-excercise">
            <div class="base-input">
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Họ và tên
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="name" class="input" value="{{ $member->name }}" required>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Email
                    </div>
                    <div class="col-md-9">
                        <input type="email" name="email" class="input" value="{{ $member->email }}" required>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Giới tính
                    </div>
                    <div class="col-md-9">
                        <input type="radio" name="gender" value="1" @if ($member->gender == 1) checked @endif required> Nam
                        <input type="radio" name="gender" value="0" @if ($member->gender == 0) checked @endif  required> Nữ
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Năm sinh
                    </div>
                    <div class="col-md-9">
                        <input type="number" name="year_of_birth" class="input" value="{{ $member->year_of_birth }}" required>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Địa chỉ
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="address" class="input" value="{{ $member->address }}" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-submit-bottom" style="margin-top: 15px">Lưu</button>
        </div>
    </form>
@endsection
