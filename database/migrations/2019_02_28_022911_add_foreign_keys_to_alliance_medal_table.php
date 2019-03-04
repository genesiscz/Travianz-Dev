<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAllianceMedalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('alliance_medal', function(Blueprint $table)
		{
			$table->foreign('alliance_id', 'FKalliance_m487074')->references('id')->on('alliance')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('medal_id', 'FKalliance_m504377')->references('id')->on('medal')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('alliance_medal', function(Blueprint $table)
		{
			$table->dropForeign('FKalliance_m487074');
			$table->dropForeign('FKalliance_m504377');
		});
	}

}
