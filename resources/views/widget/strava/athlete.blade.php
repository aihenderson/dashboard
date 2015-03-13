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
      <div class="col-sm-10 col-sm-offset-1">
        <div class="athlete col-md-12">
          <div class="athleteName">
            <span class="athleteFirstName">{{{$athlete["firstname"]}}}</span>
            <span class="athleteLastname">{{{$athlete["lastname"]}}}</span>
          </div>
          <img class="athleteProfile" src='{{{$athlete["profile"]}}}'/>
        </div>
      </div>
      @foreach ($activities as $activity)
        @if($activity["athlete"]["id"] == $athlete["id"])
          <div class="col-sm-10 col-sm-offset-1">
            <div class="panel panel-default">
              <div class="panel-body">
                <div>
                  {{--<div class="id">{{{$activity["id"]}}}</div>--}}
                  {{--<div class="athleteId">{{{$activity["athlete"]["id"]}}}</div>--}}

                  <div class="activity col-md-12">
                    <div class="name">
                      <span class="value">
                        @if($activity["type"] == 'Run')
                          <img class="activity_type run" src="/images/run.png">
                        @elseif($activity["type"] == 'Ride')
                          <img class="activity_type ride" src="/images/ride.png">
                        @endif
                        {{{$activity["name"]}}}
                      </span>
                    </div>
                    <div class="distance">
                      <span class="label>">Distance:</span>
                      <span class="value">{{{round($activity["distance"]*0.000621371192, 2)}}} miles</span>
                    </div>
                    <div class="elapsed_time">
                      <span class="label>">Elapsed Time:</span>
                      <span class="value">{{{gmdate("H:i:s", $activity["elapsed_time"])}}}</span>
                    </div>
                    <div class="average_speed">
                      <span class="label>">Average Speed: </span>
                      <span class="value">{{{round($activity["average_speed"]*2.23694, 2)}}} mph</span>
                    </div>
                    <div class="max_speed">
                      <span class="label>">Max Speed: </span>
                      <span class="value">{{{round($activity["max_speed"]*2.23694, 2)}}} mph</span>
                    </div>
                    <div class="total_elevation_gain">
                      <span class="label>">Elevation Gain:</span>
                      <span class="value">{{{$activity["total_elevation_gain"]}}}</span>
                    </div>
                    <div class="start_date_local">{{{$activity["start_date_local"]}}}</div>
                    <div class="location">
                      <span class="location_city">{{{$activity["location_city"]}}},</span>
                      <span class="location_state">{{{$activity["location_state"]}}},</span>
                      <span class="location_country">{{{$activity["location_country"]}}}</span>
                    </div>
                    @if($activity["photo_count"] > 0)
                      <div class="photo_count">{{{$activity["photo_count"]}}}</div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endif
      @endforeach

    </div>
  </div>

@endsection
