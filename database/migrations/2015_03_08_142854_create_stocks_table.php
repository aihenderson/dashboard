<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('stocks', function(Blueprint $table)
    {
      $table->increments('id');
      $table->string('status');
      $table->string('name');
      $table->string('symbol');
      $table->double('lastprice');
      $table->double('pricechange');
      $table->double('changepercent');
      $table->timestamp('timestamp');
      $table->double('msdate');
      $table->double('marketCap');
      $table->int('volume');
      $table->double('changeytd');
      $table->double('changepercentytd');
      $table->double('high');
      $table->double('low');
      $table->double('open');
      $table->rememberToken();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('stocks');
  }

}
