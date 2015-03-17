<?php if(isset($_GET["debug"])){ foreach($images as $image){ dump($image); }; die(); } ?>

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

      <?php dd($images); ?>
      
      @if(isset($images))
        @foreach ($images as $image)
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