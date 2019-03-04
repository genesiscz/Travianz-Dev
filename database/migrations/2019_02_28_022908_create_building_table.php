<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBuildingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('building', function(Blueprint $table)
		{
			$table->integer('id');
			$table->integer('village_id')->index('FKbuilding362675');
			$table->smallInteger('type')->default(0);
			$table->boolean('level')->default(0);
			$table->primary(['id','village_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('building');
	}

}
