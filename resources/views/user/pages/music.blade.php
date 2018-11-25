@foreach ($musics as $music)
    <div class="col-md-4 item">
        <a href="#">
            <div class="title col-md-8">
                {{ str_limit($music->title, $limit = 50, $end = '...') }}
            </div>
        </a>
        <div class="music-img col-md-4">
            <img src="{{ $music->image }}" alt="">
        </div>
    </div>
@endforeach