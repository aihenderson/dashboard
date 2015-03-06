@extends('app')

@section('content')
  <div class="container">
    <div class="row">
      @foreach ($widgets as $widget)
        <div class="col-sm-3">
          <div class="panel panel-default">
            <div class="panel-heading">
              <a href="widget/{{strtolower($widget->title)}}">{{$widget->title}}</a>
            </div>
            <div class="panel-body">
              {{$widget->description}}
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
