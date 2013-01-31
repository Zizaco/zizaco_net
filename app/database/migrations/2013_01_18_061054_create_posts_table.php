<?php

use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Creates the posts table
		Schema::create('posts', function($table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('slug');
			$table->text('lean_content')->nullable();
			$table->text('content');
			$table->integer('author_id'); // users table relation
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}
