<?php namespace App;


use Illuminate\Support\Facades\DB;

class Stocks {

  public function getData(){

    $stock = DB::table('stocks')->get();
    $base_url = 'http://dev.markitondemand.com/Api/v2/Quote/jsonp?symbol=';
    $stocks = [];
    foreach($stock as $symbol){
      array_push($stocks, $symbol->symbol);
    }
    dd($stocks);
    $client = new Client($base_url . '/master_scoreboard.xml');
    $response = $client->get()->send();
    $data = $response->json();

    return view('/widget/stocks', $data);

  }

}