@extends('backend.layout.index', ['actor' => 'admin', 'menu' => 5])
@section('content')
    <div class="content-title">
        Tạo nhạc mới
    </div>
    <form action="{{ route('admin_action_update_music', ['music_id' => $music->id]) }}" method="post" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <div class="new-report new-excercise">
            <div class="base-input">
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Ngày tạo
                    </div>
                    <div class="col-md-9">
                        <input type="text" value="{{ date('d/m/Y', strtotime($music->created_at)) }}" class="input" readonly>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Tiêu đề
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="title" class="input" value="{{ $music->title }}" required>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Link video
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="video_link" class="input" value="https://www.youtube.com/watch?v={{ $music->video_link }}" required>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Mô tả
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="description" class="input" value="{{ $music->description }}" required>
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
    <script>
        $('input[name=video_link]').on('focusout', function () {
            if (!matchYoutubeUrl($(this).val())) {
                alert('Vui lòng nhập link youtube chính xác');
                $('.btn-submit-bottom').attr('title', 'Bạn phải nhập đúng link youtube');
                $('.btn-submit-bottom').attr('disabled', 'disabled');
            } else {
                $('.btn-submit-bottom').removeAttr('disabled', 'disabled');
            }
        });
    </script>
@endsection
