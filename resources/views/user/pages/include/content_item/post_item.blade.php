@foreach ($posts as $post)
    @include('user.include.post_item')
@endforeach
<div class="block-pagination">
    {{ $posts->links() }}
</div>