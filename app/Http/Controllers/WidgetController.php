<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\NYTimes;
use App\Videos;
use Illuminate\Http\Request;
use App\Stocks;
use App\Twitter;
use App\Mlb;
use App\Strava;
use App\InstagramFeed;
use Carbon\Carbon;

class WidgetController extends Controller {

	public function index($widget)
	{
    //
	}

  public function twitter(Twitter $twitter, Request $request)
  {
    return $twitter->execute($request->has('oauth_token'));
  }

  public function mlb(Mlb $mlb, $data = '')
  {
    if($data == 'prev'){
      $data = Carbon::now()->subDay();
    }elseif($data == 'next'){
      $data = Carbon::now()->addDay();
    }
    return $mlb->getData($data);
  }

  public function stocks(Stocks $stocks, $symbol = ''){
    if($symbol != ''){
      return $stocks->putData($symbol);
    }else{
      return $stocks->showData();
    }
  }

  public function strava(Strava $strava, $athlete = ''){
    if($athlete != ''){
      return $strava->getAthlete($athlete);
    }else{
      if (isset($_GET['code'])) {
        return $strava->getFeed();
      }else{
        return $strava->auth();
      }
    }
  }

  public function youtube(Videos $youtube, $id = ''){
    if($id != ''){
      return $youtube->getVideo($id);
    }else{
      if(isset($_GET['query'])){
        $query = $_GET['query'];
        return $youtube->getVideoList($query);
      }else{
        return $youtube->index();
      }
    }
  }

  public function nytimes(NYTimes $nytimes, $section = ''){
    if($section == '' || $section == 'top'){
      return $nytimes->top();
    }elseif($section == 'popular'){
      return $nytimes->popular();
    }elseif($section == 'newswire'){
      return $nytimes->newswire();
    }

  }


  public function instagram(InstagramFeed $instagram){
    return $instagram->index();
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
