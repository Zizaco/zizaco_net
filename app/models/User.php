<?php

use Zizaco\Confide\ConfideUser;

class User extends ConfideUser {

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
