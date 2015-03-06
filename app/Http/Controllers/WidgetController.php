<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Stocks;
use App\Twitter;
use App\Mlb;
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

  public function stocks(Stocks $stocks){
    return $stocks->getData();
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
