<?php namespace app;

use Guzzle\Service\Client;
use Illuminate\Support\Facades\Cache;

class Weather {

  public function tenDay( $returnData = 'false', $state = 'VT', $town = 'Williston'){
    $url = 'http://api.wunderground.com/api/'.env('WEATHER_KEY').'/forecast10day/q/'.$state.'/'.$town.'.json';
    $client = new Client($url);
    $response = $client->get()->send();
    $data = $response->json();
    if($returnData == 'true'){
      return $data;
    }
    return view('widget/weather')->withWeather($data);
  }

  public function fourDay( $returnData = 'false', $state = 'VT', $town = 'Williston'){
    $url = 'http://api.wunderground.com/api/'.env('WEATHER_KEY').'/forecast/q/'.$state.'/'.$town.'.json';
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
    $data = $this->fourDay('true');
    return $data;
  }

}