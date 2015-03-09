<?php namespace App;

use Guzzle\Service\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class Stocks {

  public function showData(){

    $stocks = DB::table('stocks')->get();
    if (Cache::has('stocks_cache'))
    {
      return view('/widget/stocks')->withStocks($stocks);
    } else {
      $expiresAt = Carbon::now()->addMinutes(60);
      Cache::put('stocks_cache', $stocks, $expiresAt);
      return $this->updateData();
    }

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

    return $this->showData();

  }

  public function updateData(){

    $stocks = DB::table('stocks')->get();
    foreach($stocks as $stock){
      $client = new Client('http://dev.markitondemand.com/Api/v2/Quote/json?symbol=' . $stock->symbol);
      $response = $client->get()->send();
      $data = $response->json();

      DB::table('stocks')
        ->where('Symbol', $data['Symbol'])
        ->update([
        'Status' => $data['Status'],
        'Name' => $data['Name'],
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

      return $this->showData();

    }
  }

}