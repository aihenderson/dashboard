<?php $idArray = []; ?>
@foreach ($activities as $activity)
  @if(!in_array($activity["athlete"]["id"], $idArray))
    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-body">
          <div>
            {{--<div class="id">{{{$activity["id"]}}}</div>--}}
            {{--<div class="athleteId">{{{$activity["athlete"]["id"]}}}</div>--}}
            <div class="athlete col-sm-4">
              @if($activity["athlete"]["profile_medium"] == 'avatar/athlete/medium.png')
                <img class="athleteProfile" src='/images/default_strava_medium.jpg'/>
              @else
                <img class="athleteProfile" src='{{{$activity["athlete"]["profile_medium"]}}}'/>
              @endif
            </div>
            <div class="activity col-sm-8">
              <div class="athleteName">
                <a href="/widget/strava/athlete/{{{$activity["athlete"]["id"]}}}">
                  <span class="athleteFirstName">{{{$activity["athlete"]["firstname"]}}}</span>
                  <span class="athleteLastname">{{{$activity["athlete"]["lastname"]}}}</span>
                </a>
              </div>
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
                <span class="label>">Time:</span>
                <span class="value">{{{gmdate("H:i:s", $activity["elapsed_time"])}}}</span>
              </div>
            </div>
          </div>
          <?php array_push($idArray, $activity["athlete"]["id"]); ?>
        </div>
      </div>
    </div>
  @endif
@endforeach