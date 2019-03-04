<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToActivationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('activation', function(Blueprint $table)
		{
			$table->foreign('user_id', 'FKactivation688948')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('referral_user_id', 'FKactivation796346')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('activation', function(Blueprint $table)
		{
			$table->dropForeign('FKactivation688948');
			$table->dropForeign('FKactivation796346');
		});
	}

}
