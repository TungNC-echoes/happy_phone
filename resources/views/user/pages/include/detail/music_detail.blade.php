<div class="slide-bar col-md-12">
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Trang chủ</a>
        <span> > </span>
        <a href="{{ route('content', \App\Model\Category::MUSIC) }}"> {{ $categories->find(\App\Model\Category::MUSIC)->title }} </a>
        <span> > </span>
        <a href="{{ route('show_music_detail', $music->id) }}"> {{ $music->title }} </a>
    </div>
    <h4>{{ $music->title }}</h4>
    <div class="description">
        {{ $music->description }}
    </div>
</div>
<div class="content col-md-12" style="margin-top: 20px;">
    <div class="col-md-8">
        <h2>{{ $music->title }} </h2>
        <p>
            <iframe width="700" height="400" src="https://www.youtube.com/embed/{{  $music->video_link  }}"
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
                    Nhạc thể hình mới
                </div>
            </div>
            <div class="content">
                @foreach ($new_musics as $new_music)
                    <div class="content-post col-md-12">
                        <div class="img">
                            <img width="100px" height="70px" src="{{ $new_music->image }}" alt="">
                        </div>
                        <div class="title-post">
                            <a href="{{ route('show_music_detail', $new_music->id) }}" title="{{ $new_music->title }}">{{ str_limit($new_music->title, $limit = 50, $end = '...') }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>