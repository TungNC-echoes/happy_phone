<div class="block-tile">
    <div class="title">
        {{ $category->title }}
    </div>
</div>
<div class="block-content">
    @foreach ($excercises as $excercise)
        @include('user.include.excercise_item')
    @endforeach
</div>
<div class="block-pagination">
    {{ $excercises->links() }}
</div>