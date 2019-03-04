<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArtefactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('artefact', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('village_id')->index('FKartefact516371');
			$table->boolean('type')->default(0);
			$table->boolean('size')->default(0);
			$table->boolean('active')->default(0);
			$table->boolean('deleted')->default(0);
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
		Schema::drop('artefact');
	}

}
