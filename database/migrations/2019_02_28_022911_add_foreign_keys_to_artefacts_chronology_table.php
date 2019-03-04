<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToArtefactsChronologyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('artefacts_chronology', function(Blueprint $table)
		{
			$table->foreign('artefact_id', 'FKartefacts_631181')->references('id')->on('artefact')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('artefacts_chronology', function(Blueprint $table)
		{
			$table->dropForeign('FKartefacts_631181');
		});
	}

}
