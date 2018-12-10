<?php

namespace App\Http\Controllers\User;

use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Model\Category;
use App\Model\Excercise;
use App\Model\Post;
use App\Model\Music;

class HomeController extends UserController
{
    function __construct()
    {
        parent::__construct();
        View::share('js_link', 'user/js/home.js');
    }

    public function showHome()
    {
        $new_products = Product::where('new', '1')->paginate(5);
        $sale_products = Product::where('sale','<>', 0)->paginate(5);
        return View::make('user.home', [
            'new_products' => $new_products
        ]);
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('/');
    }

    public function getSearch(Request $req)
    {
        $products = Product::where('name', 'like', '%'.$req->key.'%')->orWhere('price', $req->key)->paginate(8);
        return view('user.search', compact('products'));
    }

    public function getGioithieu()
    {
        return view('user.gioithieu');
    }

    public function getLienHe()
    {
        return view('page.lienhe');
    }

    public function getExcercises($parent_category, $tab)
    {
        switch ($tab) {
            case Category::MAN:
                $category = Category::find(Category::MAN);
                $excercises = Excercise::whereHas('category', function ($query) {
                    $query->where('parent_category_id', Category::MAN);
                })->paginate(4);
                break;
            case Category::WOMAN:
                $category = Category::find(Category::WOMAN);
                $excercises = Excercise::whereHas('category', function ($query) {
                    $query->where('parent_category_id', Category::WOMAN);
                })->paginate(4);
                break;
            case Category::YOGA:
                $category = Category::find(Category::YOGA);
                $excercises = Excercise::whereHas('category', function ($query) {
                    $query->where('parent_category_id', Category::YOGA);
                })->paginate(4);
                break;
            default:
                $excercises = Excercise::where('category_id', $tab)->paginate(4);
                if ($parent_category == 'man') {
                    $category = Category::find(Category::MAN);
                } elseif ($parent_category == 'woman') {
                    $category = Category::find(Category::WOMAN);
                } elseif ($parent_category == 'yoga') {
                    $category = Category::find(Category::YOGA);
                }
                break;
        }

        return View::make('user.include.excercise_content', ['tab' => $tab, 'category' => $category, 'excercises' => $excercises])->render();
    }

    public function getPosts()
    {
        $category = Category::find(Category::POST);
        $posts = POST::paginate(4,['*'], 'post');

        return View::make('user.include.post_content', ['category' => $category, 'posts' => $posts])->render();
    }

    public function getMusics()
    {
        $category = Category::find(Category::MUSIC);
        $musics = Music::paginate(6,['*'], 'music');

        return View::make('user.include.music_content', ['category' => $category, 'musics' => $musics])->render();
    }

    public function searchTitle(Request $request)
    {
        $search_input = $request->search_input;
        $excercise_results = Excercise::where('title', 'like', '%' . $search_input . '%')->get();
        $post_results = Post::where('title', 'like', '%' . $search_input . '%')->get();
        $music_results = Music::where('title', 'like', '%' . $search_input . '%')->get();

        return view('user.pages.search_result', compact('search_input', 'excercise_results', 'post_results', 'music_results'));
    }
}