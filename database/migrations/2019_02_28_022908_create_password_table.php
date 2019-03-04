<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePasswordTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('password', function(Blueprint $table)
		{
			$table->integer('user_id')->primary();
			$table->string('new_password');
			$table->char('activation_code', 15);
			$table->boolean('used');
			$table->timestamp('created_at')->nullable(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('password');
	}

}
