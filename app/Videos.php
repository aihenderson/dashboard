<?php namespace app;

use Madcoda\Youtube;

class Videos {

  public function index(){
    return view('widget/youtube');
  }

  public function getVideoList($query){
    $youtube = new Youtube(array('key' => env('GOOGLE_KEY')));
    $videoList = $youtube->searchVideos($query);
    return view('widget/youtube')->withVideos($videoList);
  }

  public function getVideo($id){
    $youtube = new Youtube(array('key' => env('GOOGLE_KEY')));
    $video = $youtube->getVideoInfo($id);
    return view('widget/youtube/player')->withVideo($video);
  }

  public function widget(){
    Cache::forever('Youtube', 'true');
  }


}