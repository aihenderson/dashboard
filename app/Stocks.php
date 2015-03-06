<?php namespace App;

use Guzzle\Service\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class Stocks {

  public function getData(){

    $stock_symbols = DB::table('stocks')->get();
    $stocks = [];
    foreach($stock_symbols as $symbol){
      $client = new Client('http://dev.markitondemand.com/Api/v2/Quote/json?symbol=' . $symbol->symbol);
      $response = $client->get()->send();
      $data = $response->json();
      $status = $data['Status'];
      $name = $data['Name'];
      $symbol = $data['Symbol'];
      $lastprice = $data['LastPrice'];
      $change = $data['Change'];
      $changepercent = $data['ChangePercent'];
      $timestamp = $data['Timestamp'];
      $msdate = $data['MSDate'];
      $marketCap = $data['MarketCap'];
      $volume = $data['Volume'];
      $changeytd = $data['ChangeYTD'];
      $changepercentytd = $data['ChangePercentYTD'];
      $high = $data['High'];
      $low = $data['Low'];
      $open = $data['Open'];
      print_r($data);
    }

    die();



    return view('/widget/stocks', $data);

  }

}