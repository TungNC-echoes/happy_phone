<a href="{{ route('show_excercise_detail', $excercise->id) }}">
    <div class="block-video col-md-3">
        <div class="video">
            <img src="{{ $excercise->image }}" alt="{{ $excercise->title }}">
        </div>
        <div class="description">
            {{ str_limit($excercise->title, $limit = 50, $end = '...') }}
        </div>
    </div>
</a>