<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMedalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('medal', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->boolean('position')->default(0);
			$table->smallInteger('category')->default(0);
			$table->smallInteger('week')->default(0);
			$table->integer('points')->default(0);
			$table->integer('type')->default(0);
			$table->boolean('deleted')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('medal');
	}

}
