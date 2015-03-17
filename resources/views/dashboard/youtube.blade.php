<form action="dashboard" method="get">
  <div class="form-group">
    <label for="query">Search for a video</label>
    <input name="query" type="text" class="form-control" id="query" placeholder="Epic Sax">
  </div>
  <button type="submit" class="btn btn-default">Search</button>
</form>

@if(isset($videos) && $videos != '')
  <hr/>
  <ul class="list-group">
    @foreach ($videos as $video)
      <li class="list-group-item">
        <div class="media">
          <div class="media-left">
            <a href="/widget/youtube/{{{$video->id->videoId}}}">
              <img class="media-object" src="{{{$video->snippet->thumbnails->default->url}}}" alt="{{{$video->id->videoId}}}">
            </a>
          </div>
          <div class="media-body">
            <a class="youtube_link" href="/widget/youtube/{{{$video->id->videoId}}}">
              <h4 class="media-heading">{{{$video->snippet->title}}}</h4>
            </a>
            <button type="button" class="btn btn-default btn-xs youtube_link_out">
              <a href="/widget/youtube/{{{$video->id->videoId}}}" target="_blank">
                <span class="glyphicon glyphicon-new-window btn-xs"></span>
              </a>
            </button>
            <div>
              {{{$video->snippet->description}}}
            </div>
          </div>
        </div>
      </li>
    @endforeach
  </ul>
@endif