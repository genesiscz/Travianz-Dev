<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVillageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('village', function(Blueprint $table)
		{
			$table->foreign('owner', 'FKvillage135167')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('world_id', 'FKvillage920162')->references('id')->on('world')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('village', function(Blueprint $table)
		{
			$table->dropForeign('FKvillage135167');
			$table->dropForeign('FKvillage920162');
		});
	}

}
