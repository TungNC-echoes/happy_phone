<?php

namespace App\Http\Controllers\Backend;

use App\Model\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Lesson;
use App\Model\Report;
use App\Model\Review;
use App\Model\Measurement;
use App\Model\MeasurementReport;
use App\Model\WebInfo;

class MemberController extends Controller
{
    function __construct()
    {
        $title = WebInfo::where('label', 'title')->first();
        View::share('title', $title);
    }

    public function showDasboard()
    {
        $member_id = Auth::user()->id;
        $today = date('Y-m-d', time());
        $lesson_todays = Lesson::where('member_id', $member_id)->where('date', date('Y-m-d', time()))->get();
        $lesson_yesterdays = Lesson::where('member_id', $member_id)->where('date', date('Y-m-d', time() - 86400))->get();
        $lesson_tomorrows = Lesson::where('member_id', $member_id)->where('date', date('Y-m-d', time() + 86400))->get();

        return view('backend.member.home', ['lesson_todays' => $lesson_todays, 'lesson_yesterdays' => $lesson_yesterdays, 'lesson_tomorrows' => $lesson_tomorrows]);
    }

    public function showReport()
    {
        $member_id = Auth::user()->id;
        $reports = Report::where('member_id', $member_id)->orderBy('created_at', 'desc')->paginate(5);

        return view('backend.member.report', ['reports' => $reports]);
    }

    public function showSearchReport(Request $request)
    {
        $member_id = Auth::user()->id;
        $reports = Report::where('member_id', $member_id)->where('title', 'like','%' . $request->search . '%')->orderBy('created_at', 'desc')->paginate(5);

        return view('backend.member.report', ['reports' => $reports, 'search' => $request->search]);
    }

    public function showReportDetail($report_id)
    {
        $report = Report::find($report_id);
        $coach = User::find($report->coach_id);
        $measurement_reports = MeasurementReport::where('report_id', $report->id)->get();

        return view('backend.member.report_detail', ['report' => $report, 'coach' => $coach, 'measurement_reports' => $measurement_reports]);
    }

    public function showCreateReport()
    {
        $coachs = User::where('level', User::COACH)->get();
        $measurements = Measurement::all();
        return view('backend.member.create_report', ['coachs' => $coachs, 'measurements' => $measurements]);
    }

    public function createReport(Request $request)
    {
        $member_id = Auth::user()->id;
        $report = new Report();
        $report->member_id = $member_id;
        $report->coach_id = $request->coach_id;
        $report->title = $request->title;
        $report->content = $request->content;
        $report->save();
        $measurements = Measurement::all();
        foreach ($measurements as $measurement) {
            $measurement_report = new MeasurementReport();
            $measurement_report->measurement_id = $measurement->id;
            $measurement_report->report_id = $report->id;
            $measurement_report->measure = $request[$measurement->name];
            $measurement_report->save();
        }

        return redirect(route('member_report'));
    }

    public function showReview(Request $request)
    {
        $member_id = Auth::user()->id;
        $reviews = Review::where('member_id', $member_id)->orderBy('created_at', 'desc')->paginate(5);

        return view('backend.member.review', ['reviews' => $reviews]);
    }

    public function showSearchReview(Request $request)
    {
        $member_id = Auth::user()->id;
        $reviews = Review::where('member_id', $member_id)->where('title', 'like','%' . $request->search . '%')->orderBy('created_at', 'desc')->paginate(5);

        return view('backend.member.review', ['reviews' => $reviews, 'search' => $request->search]);
    }

    public function showReviewDetail($review_id)
    {
        $review = Review::find($review_id);

        return view('backend.member.review_detail', ['review' => $review]);
    }
}