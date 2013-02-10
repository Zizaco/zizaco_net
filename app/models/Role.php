<?php

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    // Array used in FactoryMuff
    public static $factory = array(
        'name' => 'string',
        'permissions' => ["manage_posts","manage_pages","manage_users"],
    );
}
