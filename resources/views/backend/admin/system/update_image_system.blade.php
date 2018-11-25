@extends('backend.layout.index', ['actor' => 'admin', 'menu' => 5])
@section('content')
    <div class="content-title">
        Cập nhật {{ $image->label }}
    </div>
    <form action="{{ route('admin_action_update_image', ['image_id' => $image->id]) }}" method="post" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <div class="new-report new-excercise">
            <div class="base-input">
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Ngày tạo
                    </div>
                    <div class="col-md-9">
                        <input type="text" value="{{ date('d/m/Y', strtotime($image->created_at)) }}" class="input" readonly>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Tiêu đề
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="title" class="input" value="{{ $image->label }}" readonly>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Mô tả
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="alt" class="input" value="{{ $image->alt }}" required>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Image
                    </div>
                    <div class="col-md-9">
                        <input type="file" name="image" class="input" accept="image/png">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-submit-bottom" style="margin-top: 15px">Lưu</button>
        </div>
    </form>
@endsection
