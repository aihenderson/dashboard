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
      $table->string('lastprice');
      $table->string('change');
      $table->string('changepercent');
      $table->string('msdate');
      $table->string('marketCap');
      $table->string('volume');
      $table->string('changeytd');
      $table->string('changepercentytd');
      $table->string('high');
      $table->string('low');
      $table->string('open');
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
