@extends('backend.layout.index', ['actor' => 'coach', 'menu' => 3])
@section('content')
    <div class="content-title">
        Thêm mới lịch làm việc huấn luyện viên
    </div>
    <form action="{{ route('action_create_member_schedule', ['member_id' => $member->id]) }}" method="post" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <div class="new-report new-excercise">
            <div class="base-input">
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Họ và tên
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="name" class="input" value="{{ $member->name }}" disabled>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Tiêu đề
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="title" class="input" required>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Bài tập
                    </div>
                    <div class="col-md-9">
                        <select name="excercise_id" class="input">
                            @foreach ($excercises as $excercise)
                                <option value="{{ $excercise->id }}">{{ str_limit($excercise->title, $limit = 25, $end = '...') }}</option>
                            @endforeach
                        </select>
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
                        <input type="text" name="start_time" class="input time_entry" value="15:00"  required>
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
                        Mô tả
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="description" class="input" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-submit-bottom" style="margin-top: 15px">Lưu</button>
        </div>
    </form>
@endsection
