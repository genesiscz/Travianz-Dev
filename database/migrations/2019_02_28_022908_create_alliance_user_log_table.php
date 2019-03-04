<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAllianceUserLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('alliance_user_log', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('creator_user_id')->index('FKalliance_u468278');
			$table->integer('target_user_id')->index('FKalliance_u384937');
			$table->boolean('type')->default(0);
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('alliance_user_log');
	}

}
