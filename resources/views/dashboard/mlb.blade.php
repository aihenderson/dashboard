<?php $gamecount = 0; ?>
@foreach ($games as $game)
  @if($game->attributes()->away_name_abbrev == 'BOS' || $game->attributes()->home_name_abbrev == 'BOS' )
    <div class="col-sm-12">
      <div class="panel panel-default">
        @if( $game->status->attributes()->status == 'Preview')
          <div class="panel-heading">Scheduled for {{{$game->attributes()->time}}} {{{$game->attributes()->ampm}}}</div>
        @endif
        <div class="panel-body">

          {{-------- IF GAME IS POSTPONED --------}}
          @if( $game->status->attributes()->status == 'Postponed')
            {{{'This game was postponed on account of ' . $game->status->attributes()->reason}}}
          @endif
          {{---------- IF GAME IS UPCOMING ---------}}
          @if( $game->status->attributes()->status == 'Preview')
            <img class="team_logo" src="/images/logos/{{{$game->attributes()->away_team_id or 'default'}}}.png"/>
            {{{$game->attributes()->away_team_city}}}
            {{{$game->attributes()->away_team_name}}}
            <br/>
            -AT-
            <br/>
            <img class="team_logo" src="/images/logos/{{{$game->attributes()->home_team_id or 'default'}}}.png"/>
            {{{$game->attributes()->home_team_city}}}
            {{{$game->attributes()->home_team_name}}}
          @endif
          {{--------------------------------------}}

          {{-- IF GAME IS COMPLETED OR IN PROGRESS --}}
          @if( $game->status->attributes()->status == 'Final' || $game->status->attributes()->status == 'In Progress')
            <table class="scoreboard table table-condensed table-bordered">
              <thead>
              <tr>
                <th>{{{$game->status->attributes()->status}}}</th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th>7</th>
                <th>8</th>
                <th>9</th>
                <th>10</th>
                <th>R</th>
                <th>H</th>
                <th>E</th>
              </tr>
              </thead>
              <tbody>
              <tr class="away">
                <th><img class="team_logo" src="/images/logos/{{{$game->attributes()->away_team_id}}}.png"/><span class="away_abr">{{{$game->attributes()->away_name_abbrev}}}</span></th>
                <th>@if(isset($game->linescore->inning[0])){{$game->linescore->inning[0]->attributes()->away}}@endif</th>
                <th>@if(isset($game->linescore->inning[1])){{$game->linescore->inning[1]->attributes()->away}}@endif</th>
                <th>@if(isset($game->linescore->inning[2])){{$game->linescore->inning[2]->attributes()->away}}@endif</th>
                <th>@if(isset($game->linescore->inning[3])){{$game->linescore->inning[3]->attributes()->away}}@endif</th>
                <th>@if(isset($game->linescore->inning[4])){{$game->linescore->inning[4]->attributes()->away}}@endif</th>
                <th>@if(isset($game->linescore->inning[5])){{$game->linescore->inning[5]->attributes()->away}}@endif</th>
                <th>@if(isset($game->linescore->inning[6])){{$game->linescore->inning[6]->attributes()->away}}@endif</th>
                <th>@if(isset($game->linescore->inning[7])){{$game->linescore->inning[7]->attributes()->away}}@endif</th>
                <th>@if(isset($game->linescore->inning[8])){{$game->linescore->inning[8]->attributes()->away}}@endif</th>
                <th>@if(isset($game->linescore->inning[9])){{$game->linescore->inning[9]->attributes()->away}}@endif</th>
                <th>{{{$game->linescore->r->attributes()->away}}}</th>
                <th>{{{$game->linescore->h->attributes()->away}}}</th>
                <th>{{{$game->linescore->e->attributes()->away}}}</th>
              </tr>
              <tr class="home">
                <th><img class="team_logo" src="/images/logos/{{{$game->attributes()->home_team_id}}}.png"/><span class="home_abr">{{{$game->attributes()->home_name_abbrev}}}</span></th>
                <th>@if(isset($game->linescore->inning[0])){{$game->linescore->inning[0]->attributes()->home}}@endif</th>
                <th>@if(isset($game->linescore->inning[1])){{$game->linescore->inning[1]->attributes()->home}}@endif</th>
                <th>@if(isset($game->linescore->inning[2])){{$game->linescore->inning[2]->attributes()->home}}@endif</th>
                <th>@if(isset($game->linescore->inning[3])){{$game->linescore->inning[3]->attributes()->home}}@endif</th>
                <th>@if(isset($game->linescore->inning[4])){{$game->linescore->inning[4]->attributes()->home}}@endif</th>
                <th>@if(isset($game->linescore->inning[5])){{$game->linescore->inning[5]->attributes()->home}}@endif</th>
                <th>@if(isset($game->linescore->inning[6])){{$game->linescore->inning[6]->attributes()->home}}@endif</th>
                <th>@if(isset($game->linescore->inning[7])){{$game->linescore->inning[7]->attributes()->home}}@endif</th>
                <th>@if(isset($game->linescore->inning[8])){{$game->linescore->inning[8]->attributes()->home}}@endif</th>
                <th>@if(isset($game->linescore->inning[9])){{$game->linescore->inning[9]->attributes()->home}}@endif</th>
                <th>{{{$game->linescore->r->attributes()->home}}}</th>
                <th>{{{$game->linescore->h->attributes()->home}}}</th>
                <th>{{{$game->linescore->e->attributes()->home}}}</th>
              </tr>
              </tbody>
            </table>
            <div class="mixed_media">
              @if(isset($game->game_media->media))
                <div class="clearfix media_links btn-toolbar">
                  @if($game->game_media->media->attributes()->has_mlbtv == 'true')
                    <div class="btn-group" role="group">
                      <a href="http://mlb.mlb.com/shared/flash/mediaplayer/v4.5/R7/MP4.jsp?calendar_event_id={{{$game->game_media->media->attributes()->calendar_event_id}}}&media_id=&view_key=&media_type=video&source=MLB&sponsor=MLB&clickOrigin=&affiliateId=&team=mlb" target="_blank">
                        <button type="button" class="btn btn-default btn-xs">
                          <span class="glyphicon glyphicon-facetime-video btn-xs media_type"></span>
                          <span class="media_link_text">MLB.tv</span>
                        </button>
                      </a>
                      <a href="http://mlb.mlb.com/shared/flash/mediaplayer/v4.5/R7/MP4.jsp?calendar_event_id={{{$game->game_media->media->attributes()->calendar_event_id}}}&media_id=&view_key=&media_type=video&source=MLB&sponsor=MLB&clickOrigin=&affiliateId=&team=mlb" onclick="return !window.open(this.href, 'Mlb.tv', 'width=965,height=665')" target="_blank">
                        <button type="button" class="btn btn-default btn-xs">
                          <span class="glyphicon glyphicon-new-window btn-xs"></span>
                        </button>
                      </a>
                    </div>
                  @endif
                  @if($game->links->attributes()->away_audio != '')
                    <div class="btn-group" role="group">
                      <a href="http://mlb.mlb.com/shared/flash/mediaplayer/v4.5/R7/MP4.jsp?calendar_event_id={{{$game->game_media->media->attributes()->calendar_event_id}}}&media_id=&view_key=&media_type=audio&source=MLB&sponsor=MLB&clickOrigin=&affiliateId=&team=mlb&feed_code=a" target="_blank">
                        <button type="button" class="btn btn-default btn-xs">
                          <span class="glyphicon glyphicon-facetime-video btn-xs media_type"></span>
                          <span class="media_link_text">Audio Away</span>
                        </button>
                      </a>
                      <a href="http://mlb.mlb.com/shared/flash/mediaplayer/v4.5/R7/MP4.jsp?calendar_event_id={{{$game->game_media->media->attributes()->calendar_event_id}}}&media_id=&view_key=&media_type=audio&source=MLB&sponsor=MLB&clickOrigin=&affiliateId=&team=mlb&feed_code=a" onclick="return !window.open(this.href, 'Mlb.tv', 'width=965,height=665')" target="_blank">
                        <button type="button" class="btn btn-default btn-xs">
                          <span class="glyphicon glyphicon-new-window btn-xs"></span>
                        </button>
                      </a>
                    </div>
                  @endif
                  @if($game->links->attributes()->home_audio != '')
                    <div class="btn-group" role="group">
                      <a href="http://mlb.mlb.com/shared/flash/mediaplayer/v4.5/R7/MP4.jsp?calendar_event_id={{{$game->game_media->media->attributes()->calendar_event_id}}}&media_id=&view_key=&media_type=audio&source=MLB&sponsor=MLB&clickOrigin=&affiliateId=&team=mlb&feed_code=h" target="_blank">
                        <button type="button" class="btn btn-default btn-xs">
                          <span class="glyphicon glyphicon-facetime-video btn-xs media_type"></span>
                          <span class="media_link_text">Audio Home</span>
                        </button>
                      </a>
                      <a href="http://mlb.mlb.com/shared/flash/mediaplayer/v4.5/R7/MP4.jsp?calendar_event_id={{{$game->game_media->media->attributes()->calendar_event_id}}}&media_id=&view_key=&media_type=audio&source=MLB&sponsor=MLB&clickOrigin=&affiliateId=&team=mlb&feed_code=h" onclick="return !window.open(this.href, 'Mlb.tv', 'width=965,height=665')" target="_blank">
                        <button type="button" class="btn btn-default btn-xs">
                          <span class="glyphicon glyphicon-new-window btn-xs"></span>
                        </button>
                      </a>
                    </div>
                  @endif
                </div>
              @endif
            </div> {{-- Mixed Media --}}
          @endif
          {{--------------------------------------}}

        </div>
      </div>
    </div>
    <?php $gamecount++; ?>
  @endif
@endforeach

@if($gamecount == 0)
  <h3 class="nogame">No Red Sox Game Today</h3>
@endif