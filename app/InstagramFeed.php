<?php namespace app;

use Vinkla\Instagram\InstagramManager;

class InstagramFeed {

  protected $instagram;

  public function __construct(InstagramManager $instagram)
  {
    $this->instagram = $instagram;
  }

  public function index(){
    $feed = $this->instagram->getPopularMedia();
    return view('widget/instagram')->withImages($feed);
  }

  public function widget(){
    Cache::forever('Instagram', 'true');
  }

}