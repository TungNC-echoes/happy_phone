<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title->title }} - Quản lý luyện tập</title>
    <base href="{{ asset('') }}">
    <link rel="stylesheet" type="text/css" href="lib/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="lib/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="backend/css/main.css">
    <script src="lib/jQuery/jquery-3.2.1.min.js"></script>
    <script src="lib/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="lib/ckeditor/ckeditor.js"></script>
    <script src="lib/time_entry/jquery.plugin.js"></script>
    <script src="lib/time_entry/jquery.timeentry.js"></script>
</head>
<body>
<div class="container">
    @include('backend.layout.header')
    @include('backend.layout.left-menu')
    <div class="main-content col-md-9">
        @yield('content')
    </div>
</div>
@include('backend.layout.footer')
</body>
<script>
    $('.time_entry').timeEntry({show24Hours: true});
</script>
<script>
    function matchYoutubeUrl(url) {
        var p = /^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
        if(url.match(p)){
            return url.match(p)[1];
        }
        return false;
    }
</script>
</html>