<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Entrust\HasRole;

class User extends ConfideUser {
    use HasRole;

    // Array used in FactoryMuff
    public static $factory = array(
        'username' => 'string',
        'email' => 'email',
        'password' => '123123',
        'password_confirmation' => '123123',
    );

    /**
     * Has many pages
     */
    public function pages()
    {
        return $this->hasMany( 'Page', 'author_id' );
    }

    /**
     * Has many posts
     */
    public function posts()
    {
        return $this->hasMany( 'Post', 'author_id' );
    }

}
