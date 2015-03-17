<?php if(isset($_GET["debug"])){ foreach($videos as $video){ dump($video); }; die(); } ?>

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

      <div class="panel panel-default">
        <form action="/widget/youtube" method="get" class="form-inline">
          <div class="form-group">
            <label for="query">Name</label>
            <input name="query" type="text" class="form-control" id="query" placeholder="Epic Sax">
          </div>
          <button type="submit" class="btn btn-default">Search</button>
        </form>
      </div>

      @if(isset($videos))
        @foreach ($videos as $video)
          <div class="media">
            <div class="media-left">
              <a href="/widget/youtube/{{{$video->id->videoId}}}">
                <img class="media-object" src="{{{$video->snippet->thumbnails->default->url}}}" alt="{{{$video->id->videoId}}}">
              </a>
            </div>
            <div class="media-body">
              <a href="/widget/youtube/{{{$video->id->videoId}}}">
                <h4 class="media-heading">{{{$video->snippet->title}}}</h4>
              </a>
              {{{$video->snippet->description}}}
            </div>
          </div>
        @endforeach
      @endif

    </div>
  </div>
@endsection