<?php

namespace App\Http\Controllers\User;

use App\Model\Product;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;

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
            'new_products' => $new_products,
            'sale_products' => $sale_products
        ]);
    }

    public function login(Request $req)
    {
        if($req->isMethod('POST')){
            $this->validate($req,
                [
                    'email' => 'required|email',
                    'password' => 'required|min:6|max:20'
                ],
                [
                    'email.required' => 'Vui lòng nhập Email',
                    'email.email' => 'Email không đúng định dạng',
                    'password.required' => 'Vui lòng nhập mật khẩu',
                    'password.min' => 'Mật khẩu có ít nhất 6 kí tự',
                    'password.max' => 'Mật khẩu có nhiều nhất 20 kí tự'
                ]
            );
            $credentials = array(
                'email'=> $req->email,
                'password' => $req->password
            );
            if (Auth::attempt($credentials)) {
                return redirect('/')->with(['flag' => 'success', 'message' => 'Đăng nhập thành công !!!']);
            } else {
                return redirect()->back()->with(['flag' => 'danger', 'message' => 'Đăng nhập không thành công !!!']);
            }
        }
        return view('auth.login');
    }

    public function getSignin()
    {
        return view('auth.register');
    }

    public function postSignin(Request $req)
    {
        $this->validate($req,
            [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:20',
                'phone_number' => 'required|numeric|min:10|max:20',
                'address' => 'required',
                'name' => 'required',
                're_password' => 'required|same:password'
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Không đúng định dạng email',
                'email.unique' => 'Email đã có người sử dụng',
                'password,require' => 'Vui lòng nhập mật khẩu',
                're_password.same' => 'Password không giống nhau',
                'password,min' => 'Password phải nhiều hơn 6 kí tự',
                'massword,max' => 'Password phải ít hơn 20 kí tự',
                'phone_number,numeric' => 'Số điện thoại phải là số',
                'phone_number,require' => 'Số điện thoại không được để trống và phải ít nhất 10 số',
                'address,require' => 'Địa chỉ liên lạc không được để trống',
                'name.required' => 'Tên khồng được trống'
            ]
        );
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone_number = $req->phone_number;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('thanhcong', 'Đã tạo tài khoản thành công');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('/');
    }

    public function getSearch(Request $req)
    {
        $key_search  = $req->search_input;
        $products = Product::where('name', 'like', '%'.$key_search.'%')
            ->orWhere('price', $key_search)
            ->orWhere('brand', 'like', '%'.$key_search.'%')
            ->paginate(5);
        return view('user.pages.search_result', compact('products', 'key_search'));
    }

    public function getChitiet(Request $request)
    {
        $sanpham = Product::where('id', $request->id)->first();
        $sp_tuongtu = Product::where('brand','like', $sanpham->brand)->paginate(6);
        return view('user.pages.chitiet_sanpham', compact('sanpham', 'sp_tuongtu'));
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

}