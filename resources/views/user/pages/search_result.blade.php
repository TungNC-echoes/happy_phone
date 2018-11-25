@extends('user.layout.index')
@section('content')
    <div class="slide-bar col-md-12">
        <h4>Kết quả tìm kiếm cho từ khóa {{ $search_input }}</h4>
    </div>
    <div class="content col-md-12" style="margin-top: 20px;">
        @if (count($excercise_results) > 0)
            <div class="block-tile">
                <div class="title">
                    Bài tập
                </div>
            </div>
            @foreach ($excercise_results as $excercise)
                @include('user.include.excercise_item')
            @endforeach
        @endif
    </div>
    <div class="posts col-md-12" style="margin-top: 20px;">
        @if (count($post_results) > 0)
            <div class="block-tile">
                <div class="title">
                    Bài viết về thể hình
                </div>
            </div>
            @foreach ($post_results as $post)
                @include('user.include.post_item')
            @endforeach
        @endif
    </div>
    <div class="music-content child-content col-md-12" style="margin-top: 20px;">
        @if (count($music_results) > 0)
            <div class="block-tile">
                <div class="title">
                    Nhạc thể hình
                </div>
            </div>
            @foreach ($music_results as $music)
                @include('user.include.music_item')
            @endforeach
        @endif
    </div>
@endsection
