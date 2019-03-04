<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserMedalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_medal', function(Blueprint $table)
		{
			$table->integer('user_id');
			$table->integer('medal_id')->index('FKuser_medal762972');
			$table->primary(['user_id','medal_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_medal');
	}

}
