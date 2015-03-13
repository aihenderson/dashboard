@extends('app')

@section('stylesheets')
  <link href="/css/strava.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">

          <div class="strava_login">
            {!!$link!!}
          </div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
