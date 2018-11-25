@extends('backend.layout.index', ['actor' => 'admin', 'menu' => 7])
@section('content')
    <div class="content-title">
        Tạo nhạc mới
    </div>
    <form action="{{ route('admin_action_update_info', ['info_id' => $info->id]) }}" method="post" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <div class="new-report new-excercise">
            <div class="base-input">
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Ngày tạo
                    </div>
                    <div class="col-md-9">
                        <input type="text" value="{{ date('d/m/Y', strtotime($info->created_at)) }}" class="input" readonly>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Label
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="label" class="input" value="{{ $info->label }}" readonly>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Tiêu đề
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="title" class="input" value="{{ $info->title }}" required>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Link
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="url" class="input" value="{{ $info->url }}">
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Nội dung
                    </div>
                    <div class="col-md-9">
                        <textarea name="content" cols="30" rows="3">{{ $info->cotent }}</textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-submit-bottom" style="margin-top: 15px">Lưu</button>
        </div>
    </form>
@endsection
