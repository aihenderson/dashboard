<?php namespace App;

use Guzzle\Service\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class Stocks {

  public function getData(){

    $stock_symbols = DB::table('stocks')->get();
    $stocks = [];
    $data = '';
    foreach($stock_symbols as $symbol){
      $client = new Client('http://dev.markitondemand.com/Api/v2/Quote/json?symbol=' . $symbol->symbol);
      $response = $client->get()->send();
      $data = $response->json();

      $status = $data['Status'];
      $name = $data['Name'];
      $symbol = $data['Symbol'];
      $lastprice = $data['LastPrice'];
      $pricechange = $data['Change'];
      $changepercent = $data['ChangePercent'];
      $updated_at = $data['Timestamp'];
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

  public function putData($symbol){
    $client = new Client('http://dev.markitondemand.com/Api/v2/Quote/json?symbol=' . $symbol);
    $response = $client->get()->send();
    $data = $response->json();

    DB::table('stocks')->insert([
      'Status' => $data['Status'],
      'Name' => $data['Name'],
      'Symbol' => $data['Symbol'],
      'LastPrice' => $data['LastPrice'],
      'pricechange' => $data['Change'],
      'ChangePercent' => $data['ChangePercent'],
      'MSDate' => $data['MSDate'],
      'MarketCap' => $data['MarketCap'],
      'Volume' => $data['Volume'],
      'ChangeYTD' => $data['ChangeYTD'],
      'ChangePercentYTD' => $data['ChangePercentYTD'],
      'High' => $data['High'],
      'Low' => $data['Low'],
      'Open' => $data['Open']
    ]);

    return $this->getData();

  }

}