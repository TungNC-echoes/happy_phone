@extends('backend.layout.index', ['actor' => 'admin', 'menu' => 2])
@section('content')
    <div class="content-title">
        Thêm mới lịch làm việc huấn luyện viên
    </div>
    <form action="{{ route('action_create_coach_schedule', ['coach_id' => $coach->id]) }}" method="post" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <div class="new-report new-excercise">
            <div class="base-input">
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Họ và tên
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="name" class="input" value="{{ $coach->name }}" disabled>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Ngày
                    </div>
                    <div class="col-md-9">
                        <input type="date" name="date" class="input" required>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Thời gian bắt đầu
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="start_time" class="input time_entry" value="15:00" required>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Thời gian kết thúc
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="end_time" class="input time_entry" value="17:00" required>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Công việc
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="work" class="input" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-submit-bottom" style="margin-top: 15px">Lưu</button>
        </div>
    </form>
@endsection
