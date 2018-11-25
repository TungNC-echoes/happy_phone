@extends('backend.layout.index', ['actor' => 'member', 'menu' => 1])
@section('content')
    <div class="col-md-4 day yesterday">
        <div class="title">
            Hôm qua
        </div>
        <div class="lesson-block">
            @foreach ($lesson_yesterdays as $lesson_yesterday )
                <div class="lesson">
                    <div class="lesson-title">
                        {{ $lesson_yesterday->title }}
                    </div>
                    <div class="lesson-time">
                        {{ $lesson_yesterday->start_time }} {{ $lesson_yesterday->end_time }}
                    </div>
                    <div class="lesson-content">
                        {{ $lesson_yesterday->description }}
                    </div>
                    <div class="view-lesson">
                        <a href="{{ route('show_excercise_detail', $lesson_yesterday->id) }}" target="_blank">Xem bài học</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-4 day today">
        <div class="title">
            Hôm nay
        </div>
        <div class="lesson-block">
            @foreach ($lesson_todays as $lesson_today )
                <div class="lesson">
                    <div class="lesson-title">
                        {{ $lesson_today->title }}
                    </div>
                    <div class="lesson-time">
                        {{ $lesson_today->start_time }} {{ $lesson_today->end_time }}
                    </div>
                    <div class="lesson-content">
                        {{ $lesson_today->description }}
                    </div>
                    <div class="view-lesson">
                        <a href="{{ route('show_excercise_detail', $lesson_yesterday->id) }}" target="_blank">Xem bài học</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-4 day tomorrow">
        <div class="title">
            Ngày mai
        </div>
        <div class="lesson-block">
            @foreach ($lesson_tomorrows as $lesson_tomorrow )
                <div class="lesson">
                    <div class="lesson-title">
                        {{ $lesson_tomorrow->title }}
                    </div>
                    <div class="lesson-time">
                        {{ $lesson_tomorrow->start_time }} {{ $lesson_tomorrow->end_time }}
                    </div>
                    <div class="lesson-content">
                        {{ $lesson_tomorrow->description }}
                    </div>
                    <div class="view-lesson">
                        <a href="{{ route('show_excercise_detail', $lesson_yesterday->id) }}" target="_blank">Xem bài học</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
