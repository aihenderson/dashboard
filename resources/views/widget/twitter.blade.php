@extends('app')

@section('includes')
  <?php include(app_path().'/Includes/Linkify.php'); ?>
@endsection

@section('stylesheets')
  <link href="/css/twitter.css" rel="stylesheet">
@endsection

@section('favicon')
  <link rel="icon" href="/images/twitter_favicon.ico">
@endsection

@section('scripts')
  <script src="/js/twitter.js"></script>
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <?php $currentUser = ''; $i = 0;?>
        @foreach ($tweets as $tweet)
          @if($currentUser != $tweet['user']['id'])
            @if ($i<1)
             <div class="panel panel-default first-panel">
            @else
             <div class="panel panel-default top-panel">
            @endif
              <div class="media panel-heading">
                <div class="media-left media-middle panel-heading-image-container">
                  <img src="{{$tweet['user']['profile_image_url']}}" class="media-object twitter_user_image" alt="Twitter User Image"/>
                </div>
                <div class="media-body">
                  <div class="panel-heading-name-container">
                    <h4 class="media-heading user_name">{{$tweet['user']['name']}}</h4>
                    <a target="_blank" href="https://twitter.com/{{$tweet['user']['screen_name']}}"><span class="user_screen_name">{{'@' . $tweet['user']['screen_name']}}</span></a>
                  </div>
                  <div class="panel-heading-description-container">
                    <span class="user_description">{{$tweet['user']['description']}}</span>
                  </div>
                </div>
              </div>
              <div class="panel-body first-body">
                {!! linkify_twitter_status($tweet['text']) !!}
                @if(array_key_exists('extended_entities',$tweet))
                  <div class="panel-image-container">
                    @foreach($tweet['extended_entities']['media'] as $image)
                      @if(count($tweet['extended_entities']['media']) <= 1)
                        <div class="panel-image">
                          <a href="{{$image['media_url']}}" target="_blank">
                            <img src="{{$image['media_url']}}" />
                          </a>
                        </div>
                      @else
                        <div class="panel-thumbnail-image">
                          <a class="thumbnail" href="{{$image['media_url']}}" target="_blank">
                            <img src="{{$image['media_url']}}:thumb" />
                          </a>
                        </div>
                      @endif
                    @endforeach
                  </div>
                @endif
              </div>
            </div>
          @else
            <div class="panel panel-default additional-panel">
              <div class="panel-body additional-body">
                {!! linkify_twitter_status($tweet['text']) !!}
                @if(array_key_exists('extended_entities',$tweet))
                  <div class="panel-image-container">
                    @foreach($tweet['extended_entities']['media'] as $image)
                      @if(count($tweet['extended_entities']['media']) <= 1)
                        <div class="panel-image">
                          <a href="{{$image['media_url']}}" target="_blank">
                            <img src="{{$image['media_url']}}" />
                          </a>
                        </div>
                      @else
                        <div class="panel-thumbnail-image">
                          <a class="thumbnail" href="{{$image['media_url']}}" target="_blank">
                            <img src="{{$image['media_url']}}:thumb" />
                          </a>
                        </div>
                      @endif
                    @endforeach
                  </div>
                @endif
              </div>
            </div>
          @endif
          <?php $currentUser = $tweet['user']['id']; $i++; ?>
        @endforeach
      </div>
    </div>
  </div>
@endsection
