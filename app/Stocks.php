<?php namespace App;

use Guzzle\Service\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class Stocks {

  public function showData(){

    $stock_symbols = DB::table('stocks')->get();
    if (Cache::has('stocks'))
    {
      return view('/widget/stocks', $stock_symbols);
    } else {
      $expiresAt = Carbon::now()->addMinutes(60);
      Cache::put('stocks', $stock_symbols, $expiresAt);
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

    $stock_symbols = DB::table('stocks')->get();
    foreach($stock_symbols as $symbol){
      $client = new Client('http://dev.markitondemand.com/Api/v2/Quote/json?symbol=' . $symbol->symbol);
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

    }
  }

}