<?php namespace app;

use Carbon\Carbon;
use Guzzle\Plugin\Oauth\OauthPlugin;
use Guzzle\Service\Client;
use Guzzle\Cache;
use Guzzle\Http\Exception\ClientErrorResponseException;
use Illuminate\Support\Facades\View;

class Mlb {

  public function getData($date){

    if($date == ''){
      $year = date('Y');
      $month = date('m');
      $day = date('d');
    }else{
      $year = substr($date, 0, 4);
      $month = substr($date, 5, 2);
      $day = substr($date, 8, 2);
    }

    $prev = Carbon::createFromDate($year, $month, $day)->subDay()->toDateString();
    $next = Carbon::createFromDate($year, $month, $day)->addDay()->toDateString();

    $base_url = 'http://gd2.mlb.com/components/game/mlb/year_' . $year . '/month_' . $month . '/day_' . $day;
//    $base_url = 'http://gd2.mlb.com/components/game/mlb/year_2014/month_07/day_08';

//    Get Scoreboard
    $client = new Client($base_url . '/master_scoreboard.xml');
    $response = $client->get()->send();
    $data = $response->xml();
    $games = $data->game;

//    Get Media
    $media = [];
    $responseBody = '';
    $client = new Client($base_url . '/media/highlights.xml');
    try {
      $client->get()->send();
    } catch (ClientErrorResponseException $exception) {
      $responseBody = $exception->getResponse()->getStatusCode();
    }
    if($responseBody != '404'){
      $response = $client->get()->send();
      $data = $response->xml();
      $media = $data->highlights;
    }

//  return view('widget/mlb', $games);
    return view('widget/mlb')
      ->withPrev($prev)
      ->withNext($next)
      ->withGames($games)
      ->withMedia($media);

  }

}