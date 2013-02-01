<?php

return array(

    'default' => 'mysql',

    'connections' => array(

        'mysql' => array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => getenv("DATABASE_NAME"),
            'username'  => getenv("DATABASE_USERNAME"),
            'password'  => getenv("DATABASE_PASSWORD"),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ),
    ),
);
