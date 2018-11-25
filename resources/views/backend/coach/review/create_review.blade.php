@extends('backend.layout.index', ['actor' => 'coach', 'menu' => 2])
@section('content')
    <div class="content-title">
        Viết đánh giá kết quả tập luyện của thành viên {{ $report->member->name }}
    </div>
    <form action="{{ route('coach_action_create_review', ['report_id' => $report->id]) }}" method="post">
        {{ csrf_field() }}
        <div class="new-report">
            <div class="base-input">
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Ngày đánh giá
                    </div>
                    <div class="col-md-9">
                        <input type="text" value="{{ date('d/m/Y', time()) }}" class="input" readonly>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Tiêu đề
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="title" class="input" required>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Thành viên
                    </div>
                    <div class="col-md-9">
                        <input type="hidden" name="member_id" value="{{ $report->member->id }}">
                        {{ $report->member->name }}
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Kết quả đánh giá
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="result" class="input" required>
                    </div>
                </div>
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Nội dung
                    </div>
                    <div class="col-md-6">
                        <textarea name="content" id="" cols="30" rows="3"  class="input" required></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-submit-bottom" style="margin-top: 70px">Gửi đánh giá</button>
        </div>
    </form>
@endsection
