<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $user = new User;
        $user->username = 'Admin';
        $user->email = 'admin@zizaco.net';
        $user->password = 'admin';
        $user->password_confirmation = 'admin';
        $user->confirmed = 1;
        $user->save();
    }

}
