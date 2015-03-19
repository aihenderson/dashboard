<?php namespace app;

use Guzzle\Service\Client;

class NYTimes {

  /**
   * @param string $section
   * @param string $time [1 = day, 7 = week, 30 = month]
   */
  public function popular($section = 'all', $time = '1'){

    $key = env('NYTIMES_POPULAR_KEY');
    $client = new Client('http://api.nytimes.com/svc/mostpopular/v2/mostshared/'.$section.'/'.$time.'.json?api-key=' . $key);
    $response = $client->get()->send();
    $data = $response->json();
    return view('widget/nytimes')->withPopular($data);

  }

  public function top(){

    $key = env('NYTIMES_TOP_KEY');
    $client = new Client('http://api.nytimes.com/svc/topstories/v1/home.json?api-key=' . $key);
    $response = $client->get()->send();
    $data = $response->json();
    return view('widget/nytimes')->withTop($data);

  }

  /**
   * @param string $section
   * @param string $time in hours [1 - 720]
   * @param string $limit [1 - 20]
   */
  public function newswire($section = 'all', $time = '720', $limit = '20'){

    $key = env('NYTIMES_NEWSWIRE_KEY');
    $client = new Client('http://api.nytimes.com/svc/news/v3/content/all/'.$section.'/'.$time.'.json?limit='.$limit.'&api-key=' . $key);
    $response = $client->get()->send();
    $data = $response->json();
    return view('widget/nytimes')->withNewswire($data);

  }

}