@extends('user.layout.index')
@section('content')
	<div class="slide-bar col-md-12">
		<div class="breadcrumb">
			<a href="{{ route('home') }}">Trang chủ</a>
			<span> > </span>
			<a href="{{ route('content', ['category' => $content->id]) }}"> {{ $content->title }} </a>
		</div>
		<h2>{{ $content->title }}</h2>
		<div class="description">
			{{ $content->description }}
		</div>
	</div>
	@include('user.pages.include.content.' . $content_type)
@endsection
