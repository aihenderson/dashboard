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
        $this->getActivity($token);
      }
    } catch(Exception $e) {
      print $e->getMessage();
    }
  }

  public function getActivity($token){
    try {
      $adapter = new Pest('https://www.strava.com/api/v3');
      $service = new REST(env('STRAVA_TOKEN'), $adapter);
      $client = new Client($service);

      $athlete = $client->getAthlete();
//      dd($athlete);

      $activities = $client->getAthleteActivities();
//      dd($activities);

      $feed = $client->getFeed();
      foreach($feed as $activity){
        echo '<div>';
        echo '<p class="id">'.$activity["id"].'</p>';
        echo '<p class="athleteId">'.$activity["athlete"]["id"].'</p>';
        echo '<p class="athleteFirstname">'.$activity["athlete"]["firstname"].'</p>';
        echo '<p class="athleteLastname">'.$activity["athlete"]["lastname"].'</p>';
        echo '<img class="athleteProfile" src="'.$activity["athlete"]["profile"].'"/>';
        echo '<p class="name">'.$activity["name"].'</p>';
        echo '<p class="distance">'.$activity["distance"].'</p>';
        echo '<p class="moving_time">'.$activity["moving_time"].'</p>';
        echo '<p class="elapsed_time">'.$activity["elapsed_time"].'</p>';
        echo '<p class="total_elevation_gain">'.$activity["total_elevation_gain"].'</p>';
        echo '<p class="start_date_local">'.$activity["start_date_local"].'</p>';
        echo '<p class="location_city">'.$activity["location_city"].'</p>';
        echo '<p class="location_state">'.$activity["location_state"].'</p>';
        echo '<p class="location_country">'.$activity["location_country"].'</p>';
        echo '<p class="photo_count">'.$activity["photo_count"].'</p>';
        echo '<p class="average_speed">'.$activity["average_speed"].'</p>';
        echo '<p class="max_speed">'.$activity["max_speed"].'</p>';
        echo '</d>';
      }
      die();
//      dd($feed);

    } catch(Exception $e) {
      print $e->getMessage();
    }
  }

}