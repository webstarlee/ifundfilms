@extends('layouts.app')
@section('title')
Home
@endsection
@section('custom_css')
  <link href="/assets/plugins/video-js/video-js.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <div class="intro-video-container">
      <video id="background-video" class="video-js vjs-default-skin" controls preload="auto" data-setup='{ "asdf": true, "autoplay": true }'>
            <source src="{{asset('assets/images/intro_video.mp4')}}" type="video/mp4">
        </video>
    </div>
    <div class="some-description-container">
        <p>Watch video then join the exciting movie industry</p>
        <p>and earn continued income</p>
        @if (!Auth::check())
            <a href="{{route('register')}}" class="join-big-img-a"></a>
        @endif
    </div>
@endsection
@section('custom_js')
  <script src="/assets/plugins/video-js/video.js"></script>

  <!-- Unless using the CDN hosted version, update the URL to the Flash SWF -->
  <script>
    videojs.options.flash.swf = "/assets/plugins/video-js/video-js.swf";
    videojs.autoSetup();

    videojs('background-video').ready(function(){
      console.log(this.options()); //log all of the default videojs options

       // Store the video object
      var myPlayer = this, id = myPlayer.id();
      // Make up an aspect ratio
      var aspectRatio = 38/65;

      function resizeVideoJS(){
        var width = document.getElementById(id).parentElement.offsetWidth;
        myPlayer.width(width).height( width * aspectRatio );

      }
      this.play();

      // Initialize resizeVideoJS()
      resizeVideoJS();
      // Then on resize call resizeVideoJS()
      window.onresize = resizeVideoJS;
    });
  </script>
@endsection
