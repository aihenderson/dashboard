<?php namespace app;

use Strava\API\OAuth;
use Strava\API\Exception;
use Pest;
use Strava\API\Client;
use Strava\API\Service\REST;

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
        print $token;
      }
    } catch(Exception $e) {
      print $e->getMessage();
    }
  }

  public function getActivity(){
    try {
      $adapter = new Pest('https://www.strava.com/api/v3');
      $service = new REST(env('STRAVA_TOKEN'), $adapter);
      $client = new Client($service);

      $athlete = $client->getAthlete();
      print_r($athlete);

      $activities = $client->getAthleteActivities();
      print_r($activities);

      $club = $client->getClub(9729);
      print_r($club);
    } catch(Exception $e) {
      print $e->getMessage();
    }
  }

}