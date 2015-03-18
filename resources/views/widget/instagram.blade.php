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
        <div class="instagram_feed">
          @foreach ($images->data as $image)
            {{--<div class="instagram_thumbnail">--}}
              {{--<img class="instagram_thumbnail_img" src="{{{$image->images->thumbnail->url}}}" alt="Instagram Image">--}}
            {{--</div>--}}
            <div class="instagram_update">
              <img class="instagram_img" src="{{{$image->images->standard_resolution->url}}}" alt="Instagram Image">
              @if($image->user->full_name != '')
                <h4 class="instagram_user">{{{$image->user->full_name}}}</h4>
              @else
                <h4 class="instagram_user">{{{$image->user->username}}}</h4>
              @endif
              @if(isset($image->caption->text))
                <span class="instagram_caption">{{{$image->caption->text}}}</span>
              @endif
            </div>
          @endforeach
        </div>
      @endif

    </div>
  </div>
@endsection