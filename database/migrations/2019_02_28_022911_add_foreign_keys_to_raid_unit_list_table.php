<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRaidUnitListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('raid_unit_list', function(Blueprint $table)
		{
			$table->foreign('raid_id', 'FKraid_unit_181136')->references('id')->on('raid')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('raid_unit_list', function(Blueprint $table)
		{
			$table->dropForeign('FKraid_unit_181136');
		});
	}

}
