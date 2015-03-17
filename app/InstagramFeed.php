<?php namespace app;

use MetzWeb\Instagram\Instagram;

class InstagramFeed {

  public function index(){

    $config =  [
      'apiKey' => env('INSTAGRAM_CLIENT_ID'),
      'apiSecret' => env('INSTAGRAM_CLIENT_SECRET'),
      'apiCallback' => env('INSTAGRAM_REDIRECT_URI'),
    ];
    $instagram = new Instagram($config);

    if (!isset($_GET['code'])) {
      $link = '<a href="'.$instagram->getLoginUrl().'">Login with Instagram</a>';
      return view('widget/instagram/login')->withLink($link);
    } else {
      $code = $_GET['code'];
      $data = $instagram->getOAuthToken($code);
      $instagram->setAccessToken($data);
      $feed = $instagram->getUserFeed(30);
      return view('widget.instagram')->withImages($feed);
    }

    Instagram::setAccessToken($data);
    $feed = Instagram::getUserFeed(30);
    return view('widget/instagram')->withImages($feed);

  }

  public function widget(){
    Cache::forever('Instagram', 'true');
  }

}