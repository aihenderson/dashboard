<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mlb;
use App\Stocks;
use App\Strava;
use App\Twitter;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @param Twitter $twitter
   * @param Mlb $mlb
   * @param Stocks $stocks
   * @param Strava $strava
   * @return Response
   */
	public function index(Twitter $twitter, Mlb $mlb, Stocks $stocks, Strava $strava)
  {
    $widgets = DB::table('widgets')->select('title')->get();
    $twitter = $twitter->widget();
    $mlb = $mlb->widget();
    $stocks = $stocks->widget();
    $strava = $strava->widget();

    return view('dashboard')
      ->withWidgets($widgets)
      ->withTwitter($twitter)
      ->withGames($mlb)
      ->withStocks($stocks)
      ->withStrava($strava);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
