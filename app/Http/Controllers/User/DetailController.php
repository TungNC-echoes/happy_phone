<?php

namespace App\Http\Controllers\User;

use App\Model\Category;
use App\Model\Excercise;
use App\Model\Music;
use App\Model\Post;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;

class DetailController extends UserController
{
    function __construct()
    {
        parent::__construct();
        View::share('js_link', 'user/js/pages/detail.js');
    }

    public function showDetail($excercise_id)
    {
        $excercise = Excercise::find($excercise_id);
        $category = Category::find(Category::find($excercise->category_id)->parent_category_id);
        $new_excercises = Excercise::orderBy('created_at', 'desc')->limit(5)->get();
        $same_excercises = Excercise::where('category_id', $excercise->category_id)->limit(5)->get();

        return view('user.pages.detail', ['detail_type' => 'excercise', 'excercise' => $excercise, 'content' => $category, 'new_excercises' => $new_excercises, 'same_excercises' => $same_excercises]);
    }

    public function showPostDetail($post_id)
    {
        $post = Post::find($post_id);
        $content = Category::find(Category::POST);
        $new_posts = Post::orderBy('created_at', 'desc')->limit(10)->get();

        return view('user.pages.detail', ['detail_type' => 'post', 'post' => $post, 'content' => $content, 'new_posts' => $new_posts]);
    }

    public function showMusicDetail($music_id)
    {
        $music = Music::find($music_id);
        $content = Category::find(Category::MUSIC);
        $new_musics = Post::orderBy('created_at', 'desc')->limit(10)->get();

        return view('user.pages.detail', ['detail_type' => 'music', 'music' => $music, 'content' => $content, 'new_musics' => $new_musics]);
    }
}