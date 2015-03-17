<?php namespace app;

use Guzzle\Plugin\Oauth\OauthPlugin;
use Guzzle\Service\Client;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Cache;
use League\OAuth1\Client\Server\User;

class Twitter {

  /**
   * @var UserRepository
   */
  private $user;
  /**
   * @var Socialite
   */
  private $socialite;

  public function __construct(Socialite $socialite, User $user){
    $this->socialite = $socialite;
    $this->users = $user;
  }

  /**
   * @param $hasToken
   * @return mixed
   *
   */
  public function execute($hasToken){
    if( ! $hasToken ) {
      return $this->getAuthorized();
    } else {
      $user = Socialite::with('twitter')->user();
//      return $this->interact('statuses/home_timeline.json');
    }
  }

  private function getAuthorized(){
    return Socialite::with('twitter')->redirect();
  }

  public function interact($dataRequest){
    $client = new Client('https://api.twitter.com/1.1/');
    $auth = new OauthPlugin([
      'consumer_key'    =>  env('CONSUMER_KEY'),
      'consumer_secret' =>  env('CONSUMER_SECRET'),
      'token'           =>  env('TOKEN'),
      'token_secret'    =>  env('TOKEN_SECRET')
    ]);
    $client->addSubscriber($auth);
    $response = $client->get($dataRequest)->send();
    $tweets = $response->json();
    $tweets = compact('tweets');
    return view('widget/twitter', $tweets);
  }

  public function postUpdate($update){
    return $this->interact('statuses/update.json?status=' . $update, 'post');
  }

  public function widget(){
    Cache::forever('Twitter', 'true');
  }
  
}