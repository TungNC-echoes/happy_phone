@extends('user.layout.index')
@section('content')
    @include('user.layout.slide')
    <div class="content">
        <div id="man" class="child-content">
            <input type="hidden" class="category_id" value="{{ \App\Model\Category::MAN }}">
            <div class="block-tile">
                <a href="{{ route('content', ['category' => \App\Model\Category::MAN]) }}">
                    <div class="title">
                        {{ $categories->find(\App\Model\Category::MAN)->title }}
                    </div>
                </a>
                <div class="sub-content-list">
                    @foreach ($categories->where('parent_category_id', \App\Model\Category::MAN) as $category)
                        <a><input type="hidden" class="cate_tab_id" value="{{ $category->id }}">{{ $category->title }}</a>
                    @endforeach
                </div>
                <div class="sub-content-list">
                    <a class="active"><input type="hidden" class="cate_tab_id" value="{{ \App\Model\Category::MAN }}">Tất cả</a>
                </div>
            </div>
            <div class="block-content">
                @foreach ($man_excercises as $excercise)
                    @include('user.include.excercise_item')
                @endforeach
            </div>
            <div class="block-pagination">
                {{ $man_excercises->links() }}
            </div>
        </div>
        <div id="woman" class="child-content">
            <input type="hidden" class="category_id" value="{{ \App\Model\Category::WOMAN }}">
            <div class="block-tile">
                <a href="{{ route('content', ['category' => \App\Model\Category::WOMAN]) }}">
                    <div class="title">
                        {{ $categories->find(\App\Model\Category::WOMAN)->title }}
                    </div>
                </a>
                <div class="sub-content-list">
                    @foreach ($categories->where('parent_category_id', \App\Model\Category::WOMAN) as $category)
                        <a><input type="hidden" class="cate_tab_id" value="{{ $category->id }}">{{ $category->title }}</a>
                    @endforeach
                </div>

                <div class="sub-content-list">
                    <a class="active"><input type="hidden" class="cate_tab_id" value="{{ \App\Model\Category::WOMAN }}">Tất cả</a>
                </div>
            </div>
            <div class="block-content">
                @foreach ($woman_excercises as $excercise)
                    @include('user.include.excercise_item')
                @endforeach
            </div>
            <div class="block-pagination">
                {{ $woman_excercises->links() }}
            </div>
        </div>
        <div id="yoga" class="child-content">
            <input type="hidden" class="category_id" value="{{ \App\Model\Category::YOGA }}">
            <div class="block-tile">
                <a href="{{ route('content', ['category' => \App\Model\Category::YOGA]) }}">
                    <div class="title">
                        {{ $categories->find(\App\Model\Category::YOGA)->title }}
                    </div>
                </a>
                <div class="sub-content-list">
                    @foreach ($categories->where('parent_category_id', \App\Model\Category::YOGA) as $category)
                        <a><input type="hidden" class="cate_tab_id" value="{{ $category->id }}">{{ $category->title }}</a>
                    @endforeach
                </div>
                <div class="sub-content-list">
                    <a class="active"><input type="hidden" class="cate_tab_id" value="{{ \App\Model\Category::YOGA }}">Tất cả</a>
                </div>
            </div>
            <div class="block-content">
                @foreach ($yoga_excercises as $excercise)
                    @include('user.include.excercise_item')
                @endforeach
            </div>
            <div class="block-pagination">
                {{ $yoga_excercises->links() }}
            </div>
        </div>
        <div id="post" class="posts">
            <div class="block-tile">
                <a href="{{ route('content', ['category' => \App\Model\Category::POST]) }}">
                    <div class="title">
                        {{ $categories->find(\App\Model\Category::POST)->title }}
                    </div>
                </a>
            </div>
            @foreach ($posts as $post)
                @include('user.include.post_item')
            @endforeach
            <div class="block-pagination">
                {{ $posts->links() }}
            </div>
        </div>
        <div id="music" class="music-content child-content">
            <div class="block-tile">
                <a href="{{ route('content', ['category' => \App\Model\Category::MUSIC]) }}">
                    <div class="title">
                        {{ $categories->find(\App\Model\Category::MUSIC)->title }}
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
        </div>
    </div>
@endsection