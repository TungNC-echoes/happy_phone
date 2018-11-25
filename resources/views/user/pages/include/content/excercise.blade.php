<div id="content-page" class="content col-md-12" style="margin-top: 20px;">
    @foreach ($content_categories as $content_category)
        <div id="{{ 'category_' . $content_category->items()[0]->category_id }}" class="category child-content">
            <div class="block-tile">
                <div class="title">
                    {{ $categories->find($content_category->items()[0]->category_id)->title }}
                </div>
            </div>
            <div class="block-content">
                @foreach ($content_category as $excercise)
                    @include('user.include.excercise_item')
                @endforeach
            </div>
            <div class="block-pagination">
                {{ $content_category->links() }}
            </div>
        </div>
    @endforeach
</div>