<div id="music" class="music-content">
    @foreach ($musics as $music)
        @include('user.include.music_item')
    @endforeach
    <div class="block-pagination">
        {{ $musics->links() }}
    </div>
</div>
