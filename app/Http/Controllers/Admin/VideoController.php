<?php

namespace App\Http\Controllers\Admin;

use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    public function viewVideo()
    {
        return view('admin.manageVideos');
    }

    public function getVideoData()
    {
        $videos = Video::all();
        return $videos;
    }

    public function convertYoutube($url)
    {
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
        $youtube_id = $match[1];
        return $youtube_id;
    }

    public function storeVideo(Request $request)
    {
        $youtube_id = $this->convertYoutube($request->youtube_url);
        $video = new Video;
        $video->video_title = $request->video_title;
        $video->video_id = $youtube_id;
        $video->video_description = $request->video_description;
        $video->save();
        return "success";
    }

    public function getSingleVideo($id)
    {
        $video = Video::find($id);
        if ($video) {
            return $video;
        }
        return "fail";
    }

    public function updateVideo(Request $request)
    {
        $video = Video::find($request->video_id_edit);
        if ($video) {
            $youtube_id = $this->convertYoutube($request->_youtube_url);
            $video->video_title = $request->_video_title;
            $video->video_id = $youtube_id;
            $video->video_description = $request->_video_description;
            $video->save();
            return 'success';
        }
        return "fail";
    }

    public function deleteVideo($id)
    {
        $video = Video::find($id);
        if ($video) {
            $video->delete();
            return "success";
        }
        return "fail";
    }
}
