<?php if(isset($_GET["debug"])){ foreach($images as $image){ dump($image); }; die(); } ?>

@extends('app')

@section('includes')
@endsection

@section('stylesheets')
  <link href="/css/instagram.css" rel="stylesheet">
@endsection

@section('favicon')
  <link rel="icon" href="/images/instagram_favicon.ico">
@endsection

@section('scripts')
  <script src="/js/instagram.js"></script>
@endsection

@section('content')
  <div class="container">
    <div class="row">
      
      @if(isset($images))
        @foreach ($images->data as $image)
          <div class="instagram_thumbnail">
            <img class="instagram_thumbnail_img" src="{{{$image->images->thumbnail->url}}}" alt="Instagram Image">
          </div>
        @endforeach
      @endif

    </div>
  </div>
@endsection