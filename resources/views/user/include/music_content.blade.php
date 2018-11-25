<div class="block-tile">
    <a href="{{ route('content', ['category' => $category->id]) }}">
        <div class="title">
            {{ $category->title }}
        </div>
    </a>
</div>
<div class="music-content">
    @foreach ($musics as $music)
        @include('user.include.music_item')
    @endforeach
</div>
<div class="block-pagination">
    {{ $musics->links() }}
</div>