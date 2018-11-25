<div class="block-tile">
    <a href="{{ route('content', ['category' => $category->id]) }}">
        <div class="title">
            {{ $category->title }}
        </div>
    </a>
</div>
@foreach ($posts as $post)
    @include('user.include.post_item')
@endforeach
<div class="block-pagination">
    {{ $posts->links() }}
</div>
