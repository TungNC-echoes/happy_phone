<?php

namespace App\Http\Controllers\Backend;

use App\Model\Category;
use App\Model\CoachSchedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\Excercise;
use App\Model\Post;
use App\Model\Music;
use App\Model\ImageSystem;
use App\Model\WebInfo;

class AdminController extends Controller
{
    function __construct()
    {
        $title = WebInfo::where('label', 'title')->first();
        View::share('title', $title);
    }

    public function showDasboard()
    {
        $members = User::where('level', User::MEMBER)->paginate(5);

        return view('backend.admin.home', ['members' => $members]);
    }

    public function showMemberSearch(Request $request)
    {
        $members = User::where('level', User::MEMBER)->where('name', 'like','%' . $request->search . '%')->paginate(5);

        return view('backend.admin.home', ['members' => $members, 'search' => $request->search]);
    }

    public function showCreateMember()
    {
        return view('backend.admin.member.create_member');
    }

    public function actionCreateMember(Request $request)
    {
        $member = new User();
        $member->name = $request->name;
        $member->email = $request->email;
        $member->password = bcrypt($request->password);
        $member->gender = $request->gender;
        $member->year_of_birth = $request->year_of_birth;
        $member->address = $request->address;
        $member->save();
        return redirect(route('admin_dashboard'));
    }

    public function showUpdateMember($member_id)
    {
        $member = User::find($member_id);

        return view('backend.admin.member.update_member', ['member' => $member]);
    }

    public function actionUpdateMemberInfo($member_id, Request $request)
    {
        $member = User::find($member_id);
        $member->name = $request->name;
        $member->email = $request->email;
        $member->password = bcrypt($request->password);
        $member->gender = $request->gender;
        $member->year_of_birth = $request->year_of_birth;
        $member->address = $request->address;
        $member->save();

        return redirect(route('admin_dashboard'));
    }

    public function actionDeleteMember($member_id)
    {
        $member = User::find($member_id);
        $member->delete();

        return redirect(route('admin_dashboard'));
    }

    public function showMemberDetail($member_id)
    {
        $member = User::find($member_id);

        return view('backend.admin.member.member_detail', ['member' => $member]);
    }

    public function showCoachList()
    {
        $coachs = User::where('level', User::COACH)->paginate(5);

        return view('backend.admin.coach.coach_list', ['coachs' => $coachs]);
    }

    public function showCoachSearch(Request $request)
    {
        $coachs = User::where('level', User::COACH)->where('name', 'like','%' . $request->search . '%')->paginate(5);

        return view('backend.admin.coach.coach_list', ['coachs' => $coachs, 'search' => $request->search]);
    }

    public function showCreateCoach()
    {
        return view('backend.admin.coach.create_coach');
    }

    public function actionCreateCoach(Request $request)
    {
        $coach = new User();
        $coach->name = $request->name;
        $coach->email = $request->email;
        $coach->password = bcrypt($request->password);
        $coach->gender = $request->gender;
        $coach->level = User::COACH;
        $coach->year_of_birth = $request->year_of_birth;
        $coach->address = $request->address;
        $coach->save();
        return redirect(route('admin_coach_list'));
    }

    public function showUpdateCoach($coach_id)
    {
        $coach = User::find($coach_id);

        return view('backend.admin.coach.update_coach', ['coach' => $coach]);
    }

    public function actionUpdateCoachInfo($coach_id, Request $request)
    {
        $coach = User::find($coach_id);
        $coach->name = $request->name;
        $coach->email = $request->email;
        $coach->password = bcrypt($request->password);
        $coach->gender = $request->gender;
        $coach->year_of_birth = $request->year_of_birth;
        $coach->address = $request->address;
        $coach->save();

        return redirect(route('admin_coach_list'));
    }

    public function actionDeleteCoach($coach_id)
    {
        $coach = User::find($coach_id);
        $coach->delete();

        return redirect(route('admin_coach_list'));
    }

    public function showCoachDetail($coach_id)
    {
        $coach = User::find($coach_id);
        $coach_schedules = CoachSchedule::where('coach_id', $coach_id)->orderBy('date', 'desc')->paginate(5);

        return view('backend.admin.coach.coach_detail', ['coach' => $coach, 'coach_schedules' => $coach_schedules]);
    }

    public function showCreateCoachSchedule($coach_id)
    {
        $coach = User::find($coach_id);
        return view('backend.admin.coach.create_schedule', ['coach' => $coach]);
    }

    public function actionCreateCoachSchedule($coach_id, Request $request)
    {
        $coach_schedule = new CoachSchedule();
        $coach_schedule->coach_id = $coach_id;
        $coach_schedule->date = $request->date;
        $coach_schedule->start_time = $request->start_time;
        $coach_schedule->end_time = $request->end_time;
        $coach_schedule->work = $request->work;
        $coach_schedule->save();
        return redirect(route('admin_show_coach_detail', ['coach_id' => $coach_id]));
    }

    public function showExcerciseList()
    {
        $excercises = Excercise::orderBy('created_at', 'desc')->paginate(5);

        return view('backend.admin.excercise.excercise_list', ['excercises' => $excercises]);
    }

    public function showExcerciseSearch(Request $request)
    {
        $excercises = Excercise::orderBy('created_at', 'desc')->where('title', 'like','%' . $request->search . '%')->paginate(5);

        return view('backend.admin.excercise.excercise_list', ['excercises' => $excercises, 'search' => $request->search]);
    }

    public function showCreateExcercise()
    {
        $categories = Category::where('parent_category_id', '>', 0)->get();

        return view('backend.admin.excercise.create_excercise', ['categories' => $categories]);
    }

    public function actionCreateExcercise(Request $request)
    {
        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('user/images');
        $image->move($destinationPath, $input['imagename']);
        $excercise = new Excercise();
        $excercise->title = $request->title;
        $excercise->category_id = $request->category_id;
        $excercise->video_link = explode('?v=', $request->video_link, 11)[1];
        $excercise->content = $request->content;
        $excercise->description = $request->description;
        $excercise->image = 'user/images/' . $input['imagename'];
        $excercise->save();
        return redirect(route('admin_excercise_list'));
    }

    public function showUpdateExcercise($excercise_id)
    {
        $excercise = Excercise::find($excercise_id);
        $categories = Category::where('parent_category_id', '>', 0)->get();

        return view('backend.admin.excercise.update_excercise', ['categories' => $categories, 'excercise' => $excercise]);
    }

    public function actionUpdateExcercise($excercise_id, Request $request)
    {
        $excercise = Excercise::find($excercise_id);
        $image = $request->file('image');
        if ($image) {
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('user/images');
            $image->move($destinationPath, $input['imagename']);
            $excercise->image = 'user/images/' . $input['imagename'];
        }
        $excercise->title = $request->title;
        $excercise->category_id = $request->category_id;
        $excercise->video_link = explode('?v=', $request->video_link, 11)[1];
        $excercise->content = $request->content;
        $excercise->description = $request->description;
        $excercise->save();
        return redirect(route('admin_excercise_list'));
    }

    public function actionDeleteExcercise($excercise_id)
    {
        $excercise = Excercise::find($excercise_id);
        $excercise->delete();
        return redirect(route('admin_excercise_list'));
    }

    public function showPostList()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);

        return view('backend.admin.post.post_list', ['posts' => $posts]);
    }

    public function showPostSearch(Request $request)
    {
        $posts = Post::orderBy('created_at', 'desc')->where('title', 'like','%' . $request->search . '%')->paginate(5);

        return view('backend.admin.post.post_list', ['posts' => $posts, 'search' => $request->search]);
    }

    public function showCreatePost()
    {
        return view('backend.admin.post.create_post');
    }

    public function actionCreatePost(Request $request)
    {
        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('user/images');
        $image->move($destinationPath, $input['imagename']);
        $post = new Post();
        $post->category_id = Category::POST;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->description = $request->description;
        $post->image = 'user/images/' . $input['imagename'];
        $post->save();
        return redirect(route('admin_post_list'));
    }

    public function showUpdatePost($post_id)
    {
        $post = Post::find($post_id);

        return view('backend.admin.post.update_post', ['post' => $post]);
    }

    public function actionUpdatePost($post_id, Request $request)
    {
        $post = Post::find($post_id);
        if ($request->file('image')) {
            $image = $request->file('image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('user/images');
            $image->move($destinationPath, $input['imagename']);
            $post->image = 'user/images/' . $input['imagename'];
        }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->description = $request->description;
        $post->save();
        return redirect(route('admin_post_list'));
    }

    public function actionDeletePost($post_id)
    {
        $post = Post::find($post_id);
        $post->delete();
        return redirect(route('admin_post_list'));
    }

    public function showMusicList()
    {
        $musics = Music::orderBy('created_at', 'desc')->paginate(5);

        return view('backend.admin.music.music_list', ['musics' => $musics]);
    }

    public function showMusicSearch(Request $request)
    {
        $musics = Music::orderBy('created_at', 'desc')->where('title', 'like','%' . $request->search . '%')->paginate(5);

        return view('backend.admin.music.music_list', ['musics' => $musics, 'search' => $request->search]);
    }

    public function showCreateMusic()
    {
        return view('backend.admin.music.create_music');
    }

    public function actionCreateMusic(Request $request)
    {
        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('user/images');
        $image->move($destinationPath, $input['imagename']);
        $music = new Music();
        $music->category_id = Category::MUSIC;
        $music->title = $request->title;
        $music->description = $request->description;
        $music->video_link = explode('?v=', $request->video_link, 11)[1];
        $music->image = 'user/images/' . $input['imagename'];
        $music->save();
        return redirect(route('admin_music_list'));
    }

    public function showUpdateMusic($music_id)
    {
        $music = Music::find($music_id);

        return view('backend.admin.music.update_music', ['music' => $music]);
    }

    public function actionUpdateMusic($music_id, Request $request)
    {
        $music = Music::find($music_id);
        if ($request->file('image')) {
            $image = $request->file('image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('user/images');
            $image->move($destinationPath, $input['imagename']);
            $music->image = 'user/images/' . $input['imagename'];
        }
        $music->title = $request->title;
        $music->video_link = explode('?v=', $request->video_link, 11)[1];
        $music->description = $request->description;
        $music->save();
        return redirect(route('admin_music_list'));
    }

    public function actionDeleteMusic($music_id)
    {
        $music = Music::find($music_id);
        $music->delete();
        return redirect(route('admin_music_list'));
    }

    public function showImageList()
    {
        $images = ImageSystem::all();
        return view('backend.admin.system.image_list', ['images' => $images]);
    }

    public function showUpdateImage($image_id)
    {
        $image = ImageSystem::find($image_id);

        return view('backend.admin.system.update_image_system', ['image' => $image]);
    }

    public function actionUpdateImage($image_id, Request $request)
    {
        $image_system = ImageSystem::find($image_id);
        if ($request->file('image')) {
            $image = $request->file('image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('user/images');
            $image->move($destinationPath, $input['imagename']);
            $image_system->url = 'user/images/' . $input['imagename'];
        }
        $image_system->alt = $request->alt;
        $image_system->save();
        return redirect(route('admin_image_system_list'));
    }

    public function showSystemInfoList()
    {
        $web_infos = WebInfo::all();

        return view('backend.admin.system.system_info_list', ['web_infos' => $web_infos]);
    }

    public function showSystemInfo($info_id)
    {
        $info = WebInfo::find($info_id);

        return view('backend.admin.system.update_system_info', ['info' => $info]);
    }

    public function actionUpdateSystemInfo($info_id, Request $request)
    {
        $info = WebInfo::find($info_id);
        $info->title = $request->title;
        $info->content = $request->content;
        $info->url = $request->url;
        $info->save();
        return redirect(route('admin_system_infos'));
    }
}