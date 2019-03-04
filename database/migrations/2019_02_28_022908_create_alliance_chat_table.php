<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAllianceChatTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('alliance_chat', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('alliance_id')->index('FKalliance_c403419');
			$table->integer('user_id')->index('FKalliance_c21184');
			$table->string('content');
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
		Schema::drop('alliance_chat');
	}

}
