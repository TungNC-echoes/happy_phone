<a href="{{ route('show_post_detail', $post->id) }}">
    <div class="post-block col-md-6">
        <div class="post-img col-md-5">
            <img src="{{ $post->image }}" alt="">
        </div>
        <div class="post-content col-md-7">
            <div class="post-title">
                {{ str_limit($post->title, $limit = 100, $end = '...') }}
            </div>
            <div class="post-description">
                {{ str_limit($post->description, $limit = 150, $end = '...') }}
            </div>
        </div>
    </div>
</a>