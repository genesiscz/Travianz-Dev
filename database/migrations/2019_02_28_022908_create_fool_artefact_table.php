<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFoolArtefactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fool_artefact', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->boolean('type')->default(0);
			$table->boolean('size');
			$table->boolean('bad_effect')->default(0);
			$table->boolean('effect_multiplier')->default(0);
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
		Schema::drop('fool_artefact');
	}

}
