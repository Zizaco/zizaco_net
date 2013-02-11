<?php

trait TestHelper {
 
    /**
     * Returns a logged user with the Owner role
     *
     * @return User
     */
    private function owner()
    {
        $user = FactoryMuff::create('User');
        $owner_role = FactoryMuff::create('Role', array('name'=>'Owner'));

        $user->attachRole( $owner_role );

        Auth::login( $user );

        return $user;
    }
}
