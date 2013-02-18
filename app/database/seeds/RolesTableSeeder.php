<?php

class RolesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();

        $owner_role = new Role;
        $owner_role->name = 'Owner';
        $owner_role->permissions = array('manage_posts','manage_pages','manage_comments','manage_users');
        $owner_role->save();

        $user = User::first();
        $user->attachRole( $owner_role );
    }

}
