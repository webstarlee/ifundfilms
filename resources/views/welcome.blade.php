@extends('layouts.app')
@section('title')
Home
@endsection
@section('content')
    <div class="intro-video-container">
        <video id="background-video" preload="auto" loop="loop" autoplay="true" style="width:100%;" muted="muted">
            <source src="{{asset('assets/images/intro_video.mp4')}}" type="video/mp4">
        </video>
    </div>
    <div class="some-description-container">
        <p>Watch video then join the existing movie industry</p>
        <p>and earn contined income</p>
        <a href="#" class="join-big-img-a"></a>
    </div>
@endsection
