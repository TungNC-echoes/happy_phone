@extends('user.layout.index')
@section('content')
	@include('user.pages.include.detail.' . $detail_type . '_detail')
@endsection
