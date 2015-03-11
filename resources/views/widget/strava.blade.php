@extends('app')

@section('includes')
@endsection

@section('stylesheets')
  <link href="/css/strava.css" rel="stylesheet">
@endsection

@section('favicon')
  <link rel="icon" href="/images/strava_favicon.ico">
@endsection

@section('scripts')
  <script src="/js/strava.js"></script>
@endsection

@section('content')
  <div class="container">
    <div class="row">
<?php $idArray = []; ?>

  <?php dd($activities); ?>
      @foreach ($activities as $activity)
        <div class="col-sm-10 col-sm-offset-1">
          <div class="panel panel-default">
            <div class="panel-body">
<?php
                if(!in_array($activity["athlete"]["id"], $idArray)){
                  echo '<div>';
                  echo '<div class="id">'.$activity["id"].'</div>';
                  echo '<div class="athleteId">'.$activity["athlete"]["id"].'</div>';
                  echo '<div class="athleteFirstname">'.$activity["athlete"]["firstname"].'</div>';
                  echo '<div class="athleteLastname">'.$activity["athlete"]["lastname"].'</div>';
                  echo '<img class="athleteProfile" src="'.$activity["athlete"]["profile"].'"/>';
                  echo '<div class="name">'.$activity["name"].'</div>';
                  echo '<div class="type">'.$activity["type"].'</div>';
                  echo '<div class="distance">'.$activity["distance"].'</div>';
                  echo '<div class="moving_time">'.$activity["moving_time"].'</div>';
                  echo '<div class="elapsed_time">'.$activity["elapsed_time"].'</div>';
                  echo '<div class="total_elevation_gain">'.$activity["total_elevation_gain"].'</div>';
                  echo '<div class="start_date_local">'.$activity["start_date_local"].'</div>';
                  echo '<div class="location_city">'.$activity["location_city"].'</div>';
                  echo '<div class="location_state">'.$activity["location_state"].'</div>';
                  echo '<div class="location_country">'.$activity["location_country"].'</div>';
                  echo '<div class="photo_count">'.$activity["photo_count"].'</div>';
                  echo '<div class="average_speed">'.$activity["average_speed"].'</div>';
                  echo '<div class="max_speed">'.$activity["max_speed"].'</div>';
                  echo '</d>';
                  array_push($idArray, $activity["athlete"]["id"]);
                }
?>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

@endsection
