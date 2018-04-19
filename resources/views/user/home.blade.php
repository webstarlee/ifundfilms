@extends('layouts.app')
@section('title')
Home
@endsection
@section('content')
    <div class="intro-video-container">
        <video id="background-video" preload="auto" controls autoplay="true" style="width:100%;">
            <source src="{{asset('assets/images/intro_video.mp4')}}" type="video/mp4">
        </video>
    </div>
    <div class="some-description-container">
        <p>Watch video then join the exciting movie industry</p>
        <p>and earn contined income</p>
        @if (!Auth::check())
            <a href="{{route('register')}}" class="join-big-img-a"></a>
        @endif
    </div>
@endsection
