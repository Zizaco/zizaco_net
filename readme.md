# Zizaco.net

[![Build Status](https://travis-ci.org/Zizaco/zizaco_net.png)](https://travis-ci.org/Zizaco/zizaco_net)

[View Online](http://zizaco.net)

-----------------

### Setup

Do the following:

    $ git clone git://github.com/Zizaco/zizaco_net.git
    cd zizaco_net
    $ composer install

Edit the `app/config/database.php` in order to connect to an empty database

    $ php artisan migrate:install
    $ php artisan migrate
    $ php artisan db:seed

Now run the server:

    $ php artisan serve

Open __http://localhost:8080__ in your browser, go to __http://localhost:8080/admin__. username: _'Admin'_ password: _'admin'_

To run the tests, once you have phpunit installed:

    $ phpunit

-----------------

Zizaco.net is open-sourced software license under the [MIT license](http://opensource.org/licenses/MIT)
