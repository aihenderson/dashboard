<?php namespace app;

use Guzzle\Service\Client;

class Weather {

  public function tenDay($state = 'VT', $town = 'Williston', $returnData = 'false'){
    $url = 'http://api.wunderground.com/api/'.env('WEATHER_KEY').'/forecast10day/q/'.$state.'/'.$town.'.json';
    $client = new Client($url);
    $response = $client->get()->send();
    $data = $response->json();
    if($returnData == 'true'){
      return $data;
    }
    return view('widget/weather')->withWeather($data);
  }

  public function oneDay($state = 'VT', $town = 'Williston', $returnData = 'false'){
    $url = 'http://api.wunderground.com/api/'.env('WEATHER_KEY').'/forecast10day/q/'.$state.'/'.$town.'.json';
    $client = new Client($url);
    $response = $client->get()->send();
    $data = $response->json();
    if($returnData == 'true'){
      return $data;
    }
    return view('widget/weather')->withWeather($data);
  }

  public function widget(){
    Cache::forever('Weather', 'true');
    $data = $this->oneDay(null, null, 'true');
    return $data;
  }

}