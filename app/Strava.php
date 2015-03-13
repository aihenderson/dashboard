<?php namespace app;

use Strava\API\OAuth;
use Strava\API\Exception;
use Pest;
use Strava\API\Client;
use Strava\API\Service\REST;
use Illuminate\Support\Facades\Cache;

include '../vendor/autoload.php';

class Strava {

  public function auth(){
    try {
      $options = array(
        'clientId'     => env('STRAVA_CLIENT_ID'),
        'clientSecret' => env('STRAVA_CLIENT_SECRET'),
        'redirectUri'  => env('STRAVA_REDIRECT')
      );
      $oauth = new OAuth($options);

      if (!isset($_GET['code'])) {
        $link = '<a href="'.$oauth->getAuthorizationUrl().'">Connect with Strava</a>';
        return view('widget/strava/login')->withLink($link);
      } else {
        $token = $oauth->getAccessToken('authorization_code', array(
          'code' => $_GET['code']
        ));
      }
    } catch(Exception $e) {
      print $e->getMessage();
    }
  }

  public function getFeed($data = ''){
    try {
      $adapter = new Pest('https://www.strava.com/api/v3');
      $service = new REST(env('STRAVA_TOKEN'), $adapter);
      $client = new Client($service);

      $feed = $client->getFeed();
      if($data == 'data'){
        return $feed;
      }else{
        return view('widget/strava')->withActivities($feed);
      }

    } catch(Exception $e) {
      print $e->getMessage();
    }
  }

  public function getAthlete($athlete){
    try {
      $adapter = new Pest('https://www.strava.com/api/v3');
      $service = new REST(env('STRAVA_TOKEN'), $adapter);
      $client = new Client($service);

      $activities = $this->getFeed('data');
      $athlete = $client->getAthlete($athlete);
      return view('widget/strava/athlete')
        ->withAthlete($athlete)
        ->withActivities($activities);

    } catch(Exception $e) {
      print $e->getMessage();
    }
  }

  public function widget(){
    Cache::forever('Strava', 'true');
    $activities = $this->getFeed('data');
    return $activities;
  }

}