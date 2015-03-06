<?php namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Twitter;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class TwitterController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @param Twitter $twitter
   * @param Request $request
   * @return Response
   */
	public function index(Twitter $twitter, Request $request)
  {
    return $twitter->execute($request->has('oauth_token'));
	}


}
