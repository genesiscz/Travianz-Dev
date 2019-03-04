<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePreferenceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('preference', function(Blueprint $table)
		{
			$table->integer('user_id')->primary();
			$table->boolean('auto_completion')->default(0);
			$table->boolean('large_map')->default(0);
			$table->boolean('report_filter')->default(0);
			$table->string('time_zone', 30)->default('Europe');
			$table->boolean('date_format')->default(0);
			$table->string('language', 6)->default('en');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('preference');
	}

}
