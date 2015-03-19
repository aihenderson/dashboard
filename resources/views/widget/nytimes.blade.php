@extends('app')

@section('stylesheets')
  <link rel="stylesheet" href="/css/nytimes.css">
@endsection

@section('favicon')
  <link rel="icon" href="/images/nytimes_favicon.ico">
@endsection

@section('scripts')
  <script src="/js/nytimes.js"></script>
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        @if(isset($top))
          @foreach($top['results'] as $story)
            <div class="panel panel-default">
              <div class="panel-heading">
                <a class="story_link" href="{{{$story['url']}}}" target="_blank">
                  <h3 class="story_title">{{{$story['title']}}}</h3>
                </a>
                <span class="story_section"><small>{{{$story['section']}}}</small></span>
                @if(isset($story['subsection']))
                  - <span class="story_subsection"><small>{{{$story['subsection']}}}</small></span>
                @endif
              </div>
              <div class="media">
                @if(isset($story['multimedia']) && is_array($story['multimedia']))
                  @foreach($story['multimedia'] as $image)
                    @if($image['format'] == 'thumbLarge')
                      <div class="media-left">
                        <img class="story_image" src="{{{$image['url']}}}"/>
                      </div>
                    @endif
                  @endforeach
                @endif
                <div class="media-body">
                  <p class="story_content">{{{$story['abstract']}}}</p>
                  <span class="story_byline"><small>{{{$story['byline']}}}</small></span>
                </div>
              </div>
            </div>
          @endforeach
        @elseif(isset($popular))

        @elseif(isset($newswire))

        @endif
      </div>
    </div>
  </div>
@endsection
