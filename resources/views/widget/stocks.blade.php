@extends('app')

@section('stylesheets')
  <link rel="stylesheet" href="/css/stocks.css">
@endsection

@section('favicon')
  <link rel="icon" href="/images/mlb_favicon.ico">
@endsection

@section('scripts')
  <script src="/js/stocks.js"></script>
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="lookup_container">
          <div class="lookup_panel panel panel-default">
            <div class="panel-heading">Find a Stock Symbol</div>
            <div class="panel-body">
              <form class="lookup_form form-inline">
                <div class="form-group">
                  <!-- <label for="exampleInputName2">Find a Symbol</label> -->
                  <input type="text" class="form-control" id="exampleInputName2" placeholder="Apple">
                </div>
                <button type="submit" class="btn btn-default submit_button">Search</button>
              </form>
              <div class="lookup_container_error"></div>
            </div>
            <table class="lookup_container_table table table-striped">
              <thead>
              <tr>
                <th>Name</th>
                <th>Symbol</th>
              </tr>
              </thead>
              <tbody/>
            </table>
          </div>
        </div>
        <div class="stock_container">
          <div class="stock_panel panel panel-default">
            <div class="panel-heading">Check a Stocks Performance</div>
            <div class="panel-body">
              <form class="stock_form form-inline">
                <div class="form-group">
                  <label for="exampleInputName2">Stock Symbol</label>
                  <input type="text" class="form-control" id="exampleInputName2" placeholder="AAPL">
                </div>
                <button type="submit" class="btn btn-default submit_button">Add</button>
              </form>
              <div class="stock_container_error"></div>
            </div>
            <table class="stock_container_table table table-striped table-bordered">
              <thead>
              <tr>
                <th>Symbol</th>
                <th>Name</th>
                <th>LastPrice</th>
                <th>Change</th>
                <th>ChangePercent</th>
                {{--<th>ChangePercentYTD</th>--}}
                {{--<th>ChangeYTD</th>--}}
                {{--<th>High</th>--}}
                {{--<th>Low</th>--}}
                {{--<th>Open</th>--}}
                {{--<th>Timestamp</th>--}}
                <!-- <th>Volume</th> -->
              </tr>
              </thead>
              <tbody>
              @foreach($stocks as $stock)
                <tr>
                  <th>{{{$stock->symbol}}}</th>
                  <th>{{{$stock->name}}}</th>
                  <th>${{{round($stock->lastprice, 2)}}}</th>
                  <th>{{{round($stock->pricechange, 2)}}}</th>
                  <th>{{{round($stock->changepercent, 2)}}}%</th>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


@endsection
