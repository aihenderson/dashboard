@extends('app')

@section('stylesheets')
  <link href="/css/dashboard.css" rel="stylesheet">
  <link href="/css/mlb.css" rel="stylesheet">
  <link href="/css/strava.css" rel="stylesheet">
  <link href="/css/twitter.css" rel="stylesheet">
  <link href="/css/stocks.css" rel="stylesheet">
@endsection

@section('scripts')
  <script src="/js/masonry.pkgd.min.js"></script>
  <script src="/js/dashboard.js?"></script>
@endsection

@section('content')
  <div class="container dashboard">
    <div class="row js-masonry">
      @foreach ($widgets as $widget)
        <div class="{{strtolower($widget->title)}} col-sm-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <a href="widget/{{strtolower($widget->title)}}">{{$widget->title}}</a>
            </div>
            <div class="panel-body">

              @if($widget->title == "Stocks")
                @include('dashboard/stocks', $stocks)
              @endif

              @if($widget->title == "Mlb")
                @include('dashboard/mlb', $games)
              @endif

              @if($widget->title == "Strava")
                @include('dashboard/strava', $activities)
              @endif

              @if($widget->title == "Youtube")
                @include('dashboard/youtube')
              @endif

              @if($widget->title == "Instagram")
                @include('dashboard/instagram')
              @endif

            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
