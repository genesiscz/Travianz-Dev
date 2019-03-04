<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActivationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activation', function(Blueprint $table)
		{
			$table->integer('user_id')->primary();
			$table->integer('referral_user_id')->index('FKactivation796346');
			$table->char('code', 15);
			$table->boolean('map_sector')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('activation');
	}

}
