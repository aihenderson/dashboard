<?php
return [
  /*
  |--------------------------------------------------------------------------
  | Default Connection Name
  |--------------------------------------------------------------------------
  |
  | Here you may specify which of the connections below you wish to use as
  | your default connection for all work. Of course, you may use many
  | connections at once using the manager class.
  |
  */
  'default' => 'main',
  /*
  |--------------------------------------------------------------------------
  | Instagram Connections
  |--------------------------------------------------------------------------
  |
  | Here are each of the connections setup for your application. Example
  | configuration has been included, but you may add as many connections as
  | you would like.
  |
  */
  'connections' => [
    'main' => [
      'client_id' => env('INSTAGRAM_CLIENT_ID'),
      'client_secret' => env('INSTAGRAM_CLIENT_SECRET'),
      'callback_url' => env('INSTAGRAM_REDIRECT_URI'),
    ],
    'alternative' => [
      'client_id' => env('INSTAGRAM_CLIENT_ID'),
      'client_secret' => env('INSTAGRAM_CLIENT_SECRET'),
      'callback_url' => env('INSTAGRAM_REDIRECT_URI'),
    ],
  ]
];