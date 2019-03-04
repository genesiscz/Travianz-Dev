<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToForumPostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('forum_post', function(Blueprint $table)
		{
			$table->foreign('forum_topic_id', 'FKforum_post605358')->references('id')->on('forum_topic')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('owner_user_id', 'FKforum_post956341')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('forum_post', function(Blueprint $table)
		{
			$table->dropForeign('FKforum_post605358');
			$table->dropForeign('FKforum_post956341');
		});
	}

}
