<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mlb;
use App\NYTimes;
use App\Stocks;
use App\Strava;
use App\Twitter;
use App\Videos;
use App\InstagramFeed;
use App\Weather;
use Madcoda\Youtube;
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
   * @param Videos $videos
   * @param Instagram|InstagramFeed $instagram
   * @param Weather $weather
   * @param NYTimes $nytimes
   * @return Response
   */
	public function index(Twitter $twitter, Mlb $mlb, Stocks $stocks, Strava $strava, Videos $videos, InstagramFeed $instagram, Weather $weather, NYTimes $nytimes)
  {
    $widgets = DB::table('widgets')->select('title')->get();
    $twitter = $twitter->widget();
    $mlb = $mlb->widget();
    $stocks = $stocks->widget();
    $strava = $strava->widget();
    $videos = '';
    $instagram = $instagram->widget();
    $weather = $weather->widget();
    $nytimes = $nytimes->widget();

    if(isset($_GET['query'])){
      $query = $_GET['query'];
      $youtube = new Youtube(array('key' => env('GOOGLE_KEY')));
      $videos = $youtube->searchVideos($query, 3);
    }

    return view('dashboard')
      ->withWidgets($widgets)
      ->withTwitter($twitter)
      ->withGames($mlb)
      ->withStocks($stocks)
      ->withActivities($strava)
      ->withVideos($videos)
      ->withWeather($weather)
      ->withData($nytimes)
      ->withInstagram($instagram);
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
