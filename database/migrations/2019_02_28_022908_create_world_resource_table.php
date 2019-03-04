<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorldResourceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('world_resource', function(Blueprint $table)
		{
			$table->integer('world_id')->primary();
			$table->float('wood', 10, 0)->default(750);
			$table->float('clay', 10, 0)->default(750);
			$table->float('iron', 10, 0)->default(750);
			$table->float('crop', 10, 0)->default(750);
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
		Schema::drop('world_resource');
	}

}
