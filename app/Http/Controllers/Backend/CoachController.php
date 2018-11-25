<?php

namespace App\Http\Controllers\Backend;

use App\Model\Category;
use App\Model\Excercise;
use App\Model\Lesson;
use App\Model\Review;
use DateTime;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\CoachSchedule;
use App\Model\Report;
use App\Model\User;
use App\Model\MeasurementReport;
use App\Model\WebInfo;
use Illuminate\Support\Facades\Auth;

class CoachController extends Controller
{
    function __construct()
    {
        $title = WebInfo::where('label', 'title')->first();
        View::share('title', $title);
    }

    public function showDasboard()
    {
        $coach_id = Auth::user()->id;
        $schedules = CoachSchedule::where('coach_id', $coach_id)->orderBy('date', 'desc')->paginate(5);

        return view('backend.coach.home', ['schedules' => $schedules]);
    }

    public function showReportList()
    {
        $coach_id = Auth::user()->id;
        $reports = Report::where('coach_id', $coach_id)->orderBy('created_at', 'desc')->paginate(5);

        return view('backend.coach.report.report_list', ['reports' => $reports]);
    }

    public function showReportSearch(Request $request)
    {
        $coach_id = Auth::user()->id;
        $reports = Report::where('coach_id', $coach_id)->where('title', 'like','%' . $request->search . '%')->orderBy('created_at', 'desc')->paginate(5);

        return view('backend.coach.report.report_list', ['reports' => $reports, 'search' => $request->search]);
    }

    public function showReportDetail($report_id)
    {
        $report = Report::find($report_id);
        $coach = User::find($report->coach_id);
        $measurement_reports = MeasurementReport::where('report_id', $report->id)->get();

        return view('backend.coach.report.report_detail', ['report' => $report, 'coach' => $coach, 'measurement_reports' => $measurement_reports]);
    }

    public function showMemberList()
    {
        $members = User::where('level', User::MEMBER)->paginate(5);

        return view('backend.coach.member.member_list', ['members' => $members]);
    }

    public function showMemberSearch(Request $request)
    {
        $members = User::where('level', User::MEMBER)->where('name', 'like','%' . $request->search . '%')->paginate(5);

        return view('backend.coach.member.member_list', ['members' => $members, 'search' => $request->search]);
    }

    public function showMemberDetail($member_id)
    {
        $member = User::find($member_id);
        $member_schedules = Lesson::where('member_id', $member_id)->orderBy('date', 'desc')->paginate(5);

        return view('backend.coach.member.member_detail', ['member' => $member, 'member_schedules' => $member_schedules]);
    }

    public function showCreateMemberSchedule($member_id)
    {
        $member = User::find($member_id);
        $excercises = Excercise::all();

        return view('backend.coach.member.create_member_schedule', ['member' => $member, 'excercises' => $excercises]);
    }

    public function actionCreateMemberSchedule($member_id, Request $request)
    {
        $member_schedule = new Lesson();
        $member_schedule->title = $request->title;
        $member_schedule->date = $request->date;
        $member_schedule->member_id = $member_id;
        $member_schedule->excercise_id = $request->excercise_id;
        $member_schedule->start_time = $request->start_time;
        $member_schedule->end_time = $request->end_time;
        $member_schedule->description = $request->description;
        $member_schedule->save();
        return redirect(route('coach_show_member_detail', ['member_id' => $member_id]));
    }

    public function showReviewList()
    {
        $coach_id = Auth::user()->id;
        $reviews = Review::where('coach_id', $coach_id)->orderBy('created_at', 'desc')->paginate(5);

        return view('backend.coach.review.review_list', ['reviews' => $reviews]);
    }

    public function showReviewSearch(Request $request)
    {
        $coach_id = Auth::user()->id;
        $reviews = Review::where('coach_id', $coach_id)->where('title', 'like','%' . $request->search . '%')->orderBy('created_at', 'desc')->paginate(5);

        return view('backend.coach.review.review_list', ['reviews' => $reviews, 'search' => $request->search]);
    }

    public function showReviewDetail($review_id)
    {
        $review = Review::find($review_id);

        return view('backend.coach.review.review_detail', ['review' => $review]);
    }

    public function showCreateReview($report_id)
    {
        $report = Report::find($report_id);

        return view('backend.coach.review.create_review', ['report' => $report]);
    }

    public function actionCreateReview($report_id, Request $request)
    {
        $coach_id = Auth::user()->id;
        $review = new Review();
        $review->report_id = $report_id;
        $review->member_id = $request->member_id;
        $review->coach_id = $coach_id;
        $review->title = $request->title;
        $review->result = $request->result;
        $review->content = $request->content;
        $review->save();
        $report = Report::find($report_id);
        $report->status = 1;
        $report->review_id = $review->id;
        $report->save();

        return redirect(route('coach_review_list'));
    }

    public function showExcerciseList()
    {
        $excercises = Excercise::orderBy('created_at', 'desc')->paginate(5);

        return view('backend.coach.excercise.excercise_list', ['excercises' => $excercises]);
    }

    public function showExcerciseSearch(Request $request)
    {
        $excercises = Excercise::orderBy('created_at', 'desc')->where('title', 'like','%' . $request->search . '%')->paginate(5);

        return view('backend.coach.excercise.excercise_list', ['excercises' => $excercises, 'search' => $request->search]);
    }

    public function showCreateExcercise()
    {
        $categories = Category::where('parent_category_id', '>', 0)->get();

        return view('backend.coach.excercise.create_excercise', ['categories' => $categories]);
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
        return redirect(route('coach_excercise_list'));
    }
}