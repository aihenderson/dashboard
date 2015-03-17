<?php if(isset($_GET["debug"])){ dd($video); } ?>

@extends('app')

@section('includes')
@endsection

@section('stylesheets')
  <link href="/css/youtube.css" rel="stylesheet">
@endsection

@section('favicon')
  <link rel="icon" href="/images/youtube_favicon.ico">
@endsection

@section('scripts')
  <script src="/js/youtube.js"></script>
@endsection

@section('content')
  <div class="container">
    <div class="row">

        <div class="col-youtube">
          <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">{{{$video->snippet->title}}}</h3>
            </div>
            <div class="panel-body">
              {!!$video->player->embedHtml!!}
            </div>
          </div>
        </div>

    </div>
  </div>

@endsection