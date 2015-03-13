<table class="stock_container_table table table-striped table-bordered">
  <thead>
  <tr>
    <th>Symbol</th>
    <th>Name</th>
    <th>LastPrice</th>
    <th>Change</th>
    <th>ChangePercent</th>
  </tr>
  </thead>
  <tbody>
  @foreach($stocks as $stock)
    <tr class="{{{$stock->symbol}}}">
      <th>{{{$stock->symbol}}}</th>
      <th>{{{$stock->name}}}</th>
      <th>${{{round($stock->lastprice, 2)}}}</th>
      <th>{{{round($stock->pricechange, 2)}}}</th>
      <th>{{{round($stock->changepercent, 2)}}}%</th>
    </tr>
  @endforeach
  </tbody>
</table>