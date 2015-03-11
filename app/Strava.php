<?php namespace app;

use Strava\API\OAuth;
use Strava\API\Exception;
use Pest;
use Strava\API\Client;
use Strava\API\Service\REST;

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
        print '<a href="'.$oauth->getAuthorizationUrl().'">connect</a>';
      } else {
        $token = $oauth->getAccessToken('authorization_code', array(
          'code' => $_GET['code']
        ));
      }
    } catch(Exception $e) {
      print $e->getMessage();
    }
  }

  public function getFeed(){
    try {
      $adapter = new Pest('https://www.strava.com/api/v3');
      $service = new REST(env('STRAVA_TOKEN'), $adapter);
      $client = new Client($service);

      $feed = $client->getFeed(null,null,null,200);
      return view('widget/strava')->withActivities($feed);

    } catch(Exception $e) {
      print $e->getMessage();
    }
  }

}