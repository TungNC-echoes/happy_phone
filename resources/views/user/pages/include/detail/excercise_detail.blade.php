<div class="slide-bar col-md-12">
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Trang chủ</a>
        <span> > </span>
        <a href="{{ route('content', $content->id) }}"> {{ $content->title }} </a>
        <span> > </span>
        <a href="{{ route('show_excercise_detail', $excercise->id) }}"> {{ $excercise->title }} </a>
    </div>
    <h4>{{ $excercise->title }}</h4>
    <div class="description">
        {{ $excercise->description }}
    </div>
</div>
<div class="content col-md-12" style="margin-top: 20px;">
    <div class="col-md-8">
        <h2>{{ $excercise->title }} </h2>
        <p>
            <iframe width="700" height="400"
                    src="https://www.youtube.com/embed/{{ $excercise->video_link }}"
                    frameborder="0"
                    gesture="media"
                    allowfullscreen>

            </iframe>
        </p>

    </div>
    <div class="col-md-4">
        <div class="post-more">
            <div class="block-tile">
                <div class="title">
                    Bài tập mới
                </div>
            </div>
            <div class="content">
                @foreach ($new_excercises as $new_excercise)
                    <div class="content-post col-md-12">
                        <div class="img">
                            <img width="100px" height="70px" src="{{ $new_excercise->image }}" alt="">
                        </div>
                        <div class="title-post">
                            <a href="{{ route('show_excercise_detail', $new_excercise->id) }}" title="{{ $new_excercise->title }}">{{ str_limit($new_excercise->title, $limit = 50, $end = '...') }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="post-more">
            <div class="block-tile">
                <div class="title">
                    Bài tập cùng thể loại
                </div>
            </div>
            <div class="content">
                @foreach ($same_excercises as $same_excercise)
                    <div class="content-post col-md-12">
                        <div class="img">
                            <img width="100px" height="70px" src="{{ $same_excercise->image }}" alt="">
                        </div>
                        <div class="title-post">
                            <a href="{{ route('show_excercise_detail', $same_excercise->id) }}" title="{{ $same_excercise->title }}">{{ str_limit($same_excercise->title, $limit = 50, $end = '...') }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>