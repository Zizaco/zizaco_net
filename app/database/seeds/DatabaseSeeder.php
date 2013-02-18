<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        // Clean tables
        DB::table('pages')->delete();
        DB::table('posts')->delete();
        DB::table('comments')->delete();

        // Create initial resources
		$this->call('UsersTableSeeder');
        $this->call('RolesTableSeeder');
	}

}
