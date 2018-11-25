<input type="hidden" class="category_id" value="{{ $tab ? $tab : $category->id }}">
<div class="block-tile">
    <a href="{{ route('content', ['category' => $category->id]) }}">
        <div class="title">
            {{ $category->title }}
        </div>
    </a>
    <div class="sub-content-list">
        @foreach ($categories->where('parent_category_id', $category->id) as $item)
            <a @if (isset($tab) && $tab == $item->id) class="active" @endif><input type="hidden" class="cate_tab_id" value="{{ $item->id }}">{{ $item->title }}</a>
        @endforeach
    </div>
    <div class="sub-content-list">
        <a @if (!isset($tab) || $tab == $category->id) class="active" @endif><input type="hidden" class="cate_tab_id" value="{{ $category->id }}">Tất cả</a>
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
