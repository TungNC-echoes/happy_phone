<div class="slide-bar col-md-12">
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Trang chủ</a>
        <span> > </span>
        <a href="{{ route('content', \App\Model\Category::POST) }}"> {{ $categories->find(\App\Model\Category::POST)->title }} </a>
        <span> > </span>
        <a href="{{ route('show_post_detail', $post->id) }}"> {{ $post->title }} </a>
    </div>
    <h4>{{ $post->title }}</h4>
    <div class="description">
        {{ $post->description }}
    </div>
</div>
<div class="content col-md-12" style="margin-top: 20px;">
    <div class="col-md-8">
        <h2>{{ $post->title }} </h2>
        <p>
            {{ $post->content }}
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
                @foreach ($new_posts as $new_post)
                    <div class="content-post col-md-12">
                        <div class="img">
                            <img width="100px" height="70px" src="{{ $new_post->image }}" alt="">
                        </div>
                        <div class="title-post">
                            <a href="{{ route('show_post_detail', $new_post->id) }}" title="{{ $new_post->title }}">{{ str_limit($new_post->title, $limit = 50, $end = '...') }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>