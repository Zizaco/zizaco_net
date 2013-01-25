<?php

use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Creates the pages table
        Schema::create('pages', function($table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
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
		Schema::drop('pages');
	}

}
