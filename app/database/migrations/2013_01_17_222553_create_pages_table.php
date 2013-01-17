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
            $table->string('lean_title');
            $table->text('content');
            $table->integer('author_id'); // users table relation
            $table->boolean('confirmed')->default(false);
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
