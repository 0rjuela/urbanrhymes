@extends('layouts.main')

@section('javascript')
@endsection

@section('css')
	<link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
@endsection

@section('content')


<div id="game" class="game-wrapper">
	<videoscene :current="current" :baseprogress="progress" :baseurl="baseurl" :videos="videos" :menudata="menu" :videoprogress="{{ $video_progress }}"></videoscene>
</div>

@endsection
