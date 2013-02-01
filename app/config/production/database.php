<?php

return array(

    'default' => 'mysql',

    'connections' => array(

        'mysql' => array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => getenv("ZIZACO_NET_DATABASE_NAME"),
            'username'  => getenv("ZIZACO_NET_DATABASE_USERNAME"),
            'password'  => getenv("ZIZACO_NET_DATABASE_PASSWORD"),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ),
    ),
);
