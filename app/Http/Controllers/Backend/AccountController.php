<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\WebInfo;
use Illuminate\Support\Facades\View;

class AccountController extends Controller
{
    function __construct()
    {
        $title = WebInfo::where('label', 'title')->first();
        View::share('title', $title);
    }

    public function showUpdateProfile()
    {
        $user = Auth::user();
        $actor = 'member';
        if ($user->level == 1) {
            $actor = 'admin';
        } elseif ($user->level == 2) {
            $actor = 'coach';
        }
        return view('backend.account.update_profile', ['user' => $user, 'actor' => $actor]);
    }

    public function actionUpdateProfile(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->year_of_birth = $request->year_of_birth;
        $user->address = $request->address;
        $user->save();
        return redirect()->back();
    }
}