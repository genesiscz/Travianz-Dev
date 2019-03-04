<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHeroTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hero', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->index('FKhero331421');
			$table->integer('home_village_id')->default(0);
			$table->smallInteger('type')->default(0);
			$table->string('name');
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hero');
	}

}
