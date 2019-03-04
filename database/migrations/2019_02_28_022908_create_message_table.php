<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('message', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('sender_id')->index('FKmessage719024');
			$table->integer('recipient_id')->index('FKmessage982633');
			$table->char('topic');
			$table->text('content', 65535);
			$table->boolean('viewed')->default(0);
			$table->boolean('archived')->default(0);
			$table->boolean('deleted')->default(0);
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
		Schema::drop('message');
	}

}
