<a href="{{ route('show_music_detail', $music->id) }}">
    <div class="col-md-4 item">
        <div class="title col-md-8">
            {{ str_limit($music->title, $limit = 50, $end = '...') }}
        </div>
        <div class="music-img col-md-4">
            <img src="{{ $music->image }}" alt="">
        </div>
    </div>
</a>