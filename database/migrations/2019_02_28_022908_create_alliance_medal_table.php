<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAllianceMedalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('alliance_medal', function(Blueprint $table)
		{
			$table->integer('alliance_id');
			$table->integer('medal_id')->index('FKalliance_m504377');
			$table->primary(['alliance_id','medal_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('alliance_medal');
	}

}
