@if(isset($weather))
  @foreach($weather['forecast']['simpleforecast']['forecastday'] as $forcastday)
    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading weather_heading">
          <h5 class="weather_title">{{{$forcastday['date']['weekday']}}}, {{{$forcastday['date']['monthname']}}} {{{$forcastday['date']['day']}}}</h5>
        </div>
        <div class="media weather_body">
          <div class="media-left">
            <img class="weather_image" src="{{{$forcastday['icon_url']}}}"/>
          </div>
          <div class="media-body">
            <p class="weather_high">High: {{{$forcastday['high']['fahrenheit']}}}</p>
            <p class="weather_low">Low: {{{$forcastday['low']['fahrenheit']}}}</p>
            <p class="weather_condition">{{{$forcastday['conditions']}}}</p>
            <br/>
            {{--<p class="weather_txtreport">{{{$forcastdaytxt['fcttext']}}}</p>--}}
          </div>
        </div>
      </div>
    </div>
  @endforeach
@endif