@extends('backend.layout.index', ['actor' => 'admin', 'menu' => 3])
@section('content')
    <div class="content-title">
        Tạo bài tập mới
    </div>
    <form action="{{ route('admin_action_create_excercise') }}" method="post" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <div class="new-report new-excercise">
            <div class="base-input">
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Ngày tạo
                    </div>
                    <div class="col-md-9">
                        <input type="text" value="{{ date('d/m/Y', time()) }}" class="input" readonly>
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
                        Thể loại
                    </div>
                    <div class="col-md-9">
                        <select name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Link video
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="video_link" class="input video_link" required>
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
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Image
                    </div>
                    <div class="col-md-9">
                        <input type="file" name="image" class="input" accept="image/png" required>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Nội dung
                    </div>
                </div>
                <div class="col-md-12">
                    <textarea name="content" cols="30" rows="3"  class="ckeditor" required></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-submit-bottom" style="margin-top: 15px">Lưu bài viết</button>
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
