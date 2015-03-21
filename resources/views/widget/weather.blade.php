<?php if(isset($_GET["debug"])){ dd($weather); } ?>

@extends('app')

@section('includes')
@endsection

@section('stylesheets')
  <link href="/css/weather.css" rel="stylesheet">
@endsection

@section('favicon')
  <link rel="icon" href="/images/weather_favicon.ico">
@endsection

@section('scripts')
  <script src="/js/weather.js"></script>
@endsection

@section('content')
  <div class="container">
    <div class="row">

      @if(isset($weather))
        {{--@foreach($weather['forecast']['txt_forecast']['forecastday'] as $forcastdaytxt)--}}
          @foreach($weather['forecast']['simpleforecast']['forecastday'] as $forcastday)
            <div class="panel panel-default">
              <div class="panel-heading weather_heading">
                <h3 class="weather_title">{{{$forcastday['date']['weekday']}}}, {{{$forcastday['date']['monthname']}}} {{{$forcastday['date']['day']}}}</h3>
              </div>
              <div class="media weather_body">
                <div class="media-left">
                  <img class="weather_image" src="{{{$forcastday['icon_url']}}}"/>
                </div>
                <div class="media-body">
                  <span class="weather_high">High: {{{$forcastday['high']['fahrenheit']}}}</span>
                  <span class="weather_low">Low: {{{$forcastday['low']['fahrenheit']}}}</span>
                  <span class="weather_condition">{{{$forcastday['conditions']}}}</span>
                  <br/>
                  {{--<p class="weather_txtreport">{{{$forcastdaytxt['fcttext']}}}</p>--}}
                </div>
              </div>
            </div>
          @endforeach
        {{--@endforeach--}}
      @endif

    </div>
  </div>
@endsection