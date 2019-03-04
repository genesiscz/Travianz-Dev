<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRankingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ranking', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('old_rank')->default(0);
			$table->integer('climbed_ranks')->default(0);
			$table->integer('climber_points')->default(0);
			$table->integer('raided_resources')->default(0);
			$table->integer('attacking_points')->default(0);
			$table->integer('defending_points')->default(0);
			$table->integer('total_attacking_points')->default(0);
			$table->integer('total_defending_points')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ranking');
	}

}
