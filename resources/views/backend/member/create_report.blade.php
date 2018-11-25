@extends('backend.layout.index', ['actor' => 'member', 'menu' => 2])
@section('content')
    <div class="content-title">
        Viết báo cáo tập luyện
    </div>
    <form action="{{ route('member_create_report') }}" method="post">
        {{ csrf_field() }}
        <div class="new-report">
            <div class="base-input">
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        Ngày báo cáo
                    </div>
                    <div class="col-md-9">
                        <input type="text" value="{{ date('Y/m/d', time()) }}" name="create_date" class="input" readonly>
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
                        Huấn luyện viên
                    </div>
                    <div class="col-md-9">
                        <select name="coach_id" id="" class="input" required>
                            @foreach ($coachs as $coach)
                                <option value="{{ $coach->id }}">{{ $coach->name }}</option>
                            @endforeach
                        </select>
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
            @foreach ($measurements as $measurement )
                <div class="col-md-12 block-input">
                    <div class="col-md-3 title">
                        {{ $measurement->display_name }}
                    </div>
                    <div class="col-md-5">
                        <input type="number" name="{{ $measurement->name }}" class="input" required>
                    </div>
                    <div class="col-md-3 unit">
                        {{ $measurement->unit }}
                    </div>
                </div>
            @endforeach
            <button type="submit" class="btn btn-submit-bottom">Gửi báo cáo</button>
        </div>
    </form>
@endsection
