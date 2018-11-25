<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\ImageSystem;
use App\Model\WebInfo;

class UserController extends Controller
{
    /**
     * Controller constructor.
     */
    function __construct()
    {
        $logo = ImageSystem::where('label', 'logo')->first();
        View::share('logo', $logo);
        $title = WebInfo::where('label', 'title')->first();
        View::share('title', $title);
        $slides = ImageSystem::where('label', 'slide')->get();
        View::share('first_slide', $slides->shift());
        View::share('slides', $slides);
        $about = WebInfo::where('label', 'about')->first();
        View::share('about', $about);
        $root_from = WebInfo::where('label', 'root_from')->first();
        View::share('root_from', $root_from);
        $fanpage = WebInfo::where('label', 'fanpage')->first();
        View::share('fanpage', $fanpage);
        $youtube = WebInfo::where('label', 'youtube')->first();
        View::share('youtube', $youtube);
        $contact = WebInfo::where('label', 'contact')->first();
        View::share('contact', $contact);
        $root_categories = Category::where('parent_category_id', 0)->get();
        View::share('root_categories', $root_categories);
        $categories = Category::all();
        View::share('categories', $categories);
    }
}