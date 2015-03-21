<?php namespace app;

use Guzzle\Service\Client;
use Illuminate\Support\Facades\Cache;

class NYTimes {

  /**
   * @param string $returnData
   * @param string $section
   * @param string $time [1 = day, 7 = week, 30 = month]
   * @return array|bool|float|int|string
   */
  public function popular($returnData = 'false', $section = 'all-sections', $time = '1'){

    $key = env('NYTIMES_POPULAR_KEY');
    $client = new Client('http://api.nytimes.com/svc/mostpopular/v2/mostshared/'.$section.'/'.$time.'.json?api-key=' . $key);
    $response = $client->get()->send();
    $data = $response->json();
    if($returnData == 'true'){
      return $data;
    }
    return view('widget/nytimes')->withData($data);

  }

  public function top($returnData = 'false'){

    $key = env('NYTIMES_TOP_KEY');
    $client = new Client('http://api.nytimes.com/svc/topstories/v1/home.json?api-key=' . $key);
    $response = $client->get()->send();
    $data = $response->json();
    if($returnData == 'true'){
      return $data;
    }
    return view('widget/nytimes')->withData($data);

  }

  /**
   * @param string $returnData
   * @param string $section
   * @param string $time in hours [1 - 720]
   * @param string $limit [1 - 20]
   * @return
   */
  public function newswire($returnData = 'false', $section = 'all', $time = '720', $limit = '20'){

    $key = env('NYTIMES_NEWSWIRE_KEY');
    $client = new Client('http://api.nytimes.com/svc/news/v3/content/all/'.$section.'/'.$time.'.json?limit='.$limit.'&api-key=' . $key);
    $response = $client->get()->send();
    $data = $response->json();
    if($returnData == 'true'){
      return $data;
    }
    return view('widget/nytimes')->withData($data);

  }

  public function widget(){
    Cache::forever('NYTimes', 'true');
    $data = $this->top('true');
    return $data;
  }

}