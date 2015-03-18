<?php namespace app;

use Illuminate\Support\Facades\Cache;
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
      if (Cache::has('instagram_token'))
      {
        $data = Cache::get('instagram_token');
        $instagram->setAccessToken($data);
        $feed = $instagram->getUserFeed(30);
        return view('widget.instagram')->withImages($feed);
      }
      $code = $_GET['code'];
      $data = $instagram->getOAuthToken($code);
      $instagram->setAccessToken($data);
      $feed = $instagram->getUserFeed(30);
      Cache::put('instagram_token', $data->access_token, 120);
      return view('widget.instagram')->withImages($feed);
    }

  }

  public function widget(){
    Cache::forever('Instagram', 'true');
    $instagram = new Instagram(env('INSTAGRAM_CLIENT_ID'));
    if (Cache::has('instagram_token'))
    {
      $data = Cache::get('instagram_token');
      $instagram->setAccessToken($data);
      $feed = $instagram->getUserFeed(9);
      return $feed;
    }elseif(isset($_GET['code'])) {
      $code = $_GET['code'];
      $data = $instagram->getOAuthToken($code);
      $instagram->setAccessToken($data);
      Cache::put('instagram_token', $data->access_token, 120);
    }else{
      $link = '<a href="'.$instagram->getLoginUrl().'">Login with Instagram</a>';
      return $link;
    }

  }

}