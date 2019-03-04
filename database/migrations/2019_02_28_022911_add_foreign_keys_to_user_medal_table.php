<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUserMedalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_medal', function(Blueprint $table)
		{
			$table->foreign('user_id', 'FKuser_medal292657')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('medal_id', 'FKuser_medal762972')->references('id')->on('medal')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_medal', function(Blueprint $table)
		{
			$table->dropForeign('FKuser_medal292657');
			$table->dropForeign('FKuser_medal762972');
		});
	}

}
