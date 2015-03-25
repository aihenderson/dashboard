@if(isset($data))
  <?php $i = 0; ?>
  @foreach($data['results'] as $story)
    <?php if ($i >= 5) break; ?>
      <div class="panel panel-default">
        <div class="panel-heading story_heading">
          <a class="story_link" href="{{{$story['url']}}}" target="_blank">
            <p class="story_title">{{{$story['title']}}}</p>
          </a>
        </div>
        @if(isset($story['multimedia']) && is_array($story['multimedia']))
          <div class="media story_body">
            @foreach($story['multimedia'] as $image)
              @if($image['format'] == 'thumbLarge')
                <div class="media-left">
                  <img class="story_image" src="{{{$image['url']}}}"/>
                </div>
              @endif
            @endforeach
        @else
          <div class="media story_body no_image">
        @endif
          <div class="media-body">
            <p class="story_content">{{{$story['abstract']}}}</p>
          </div>
        </div>
      </div>
    <?php $i++;?>
  @endforeach
@endif