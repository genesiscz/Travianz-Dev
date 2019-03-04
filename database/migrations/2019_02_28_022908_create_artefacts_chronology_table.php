<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArtefactsChronologyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('artefacts_chronology', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('artefact_id')->index('FKartefacts_631181');
			$table->integer('robbed_village_id');
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
		Schema::drop('artefacts_chronology');
	}

}
