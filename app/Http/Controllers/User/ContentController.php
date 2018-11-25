<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Excercise;
use App\Model\Post;
use App\Model\Music;

class ContentController extends UserController
{
    function __construct()
    {
        parent::__construct();
        View::share('js_link', 'user/js/pages/content.js');
    }

    public function showContent($category_id)
    {
        $content = Category::find($category_id);
        $category_ids = Category::where('parent_category_id', $category_id)->pluck('id');
        if (in_array($category_id, [Category::MAN, Category::WOMAN, Category::YOGA])) {
            $content_categories = [];
            foreach ($category_ids as $category_id) {
                $content_categories[$category_id] = Excercise::where('category_id', $category_id)->with('category')->paginate(4,['*'], 'category_' . $category_id);
            }

            return view('user.pages.content', ['content' => $content, 'content_type' => 'excercise', 'content_categories' => $content_categories]);
        }

        if ($category_id == Category::POST) {
            $posts = POST::paginate(8);
            return view('.user.pages.content', ['content' => $content, 'content_type' => 'posts', 'posts' => $posts]);
        }

        if ($category_id == Category::MUSIC) {
            $musics = Music::paginate(12);
            return view('.user.pages.content', ['content' => $content, 'content_type' => 'musics', 'musics' => $musics]);
        }

    }

    public function getExcerciseContent($category_id)
    {
        $category = Category::find($category_id);
        $excercises = Excercise::where('category_id', $category_id)->paginate(4,['*'], 'category_' . $category_id);
        return View::make('user.pages.include.content_item.excercise_item', ['category' => $category, 'excercises' => $excercises])->render();
    }

    public function getPosts() {
        $posts = POST::paginate(8);
        return View::make('user.pages.include.content_item.post_item', ['posts' => $posts])->render();
    }

    public function getMusics() {
        $musics = Music::paginate(12);
        return View::make('user.pages.include.content_item.music_item', ['musics' => $musics])->render();
    }
}