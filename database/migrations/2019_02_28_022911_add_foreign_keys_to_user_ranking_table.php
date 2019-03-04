<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUserRankingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_ranking', function(Blueprint $table)
		{
			$table->foreign('user_id', 'FKuser_ranki736599')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('ranking_id', 'FKuser_ranki817840')->references('id')->on('ranking')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_ranking', function(Blueprint $table)
		{
			$table->dropForeign('FKuser_ranki736599');
			$table->dropForeign('FKuser_ranki817840');
		});
	}

}
