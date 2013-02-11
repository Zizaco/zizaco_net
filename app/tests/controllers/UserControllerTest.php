<?php

class UserControllerTest extends ControllerTestCase {
    
    public function test_should_login()
    {
        $this->requestAction('GET', 'UserController@login');
        $this->assertRequestOk();
    }

    public function test_should_do_login()
    {
        $user = FactoryMuff::create('User', array('password'=>'123123'));

        $credentials = array('email'=>$user->email, 'password'=>'123123');

        $this->withInput( $credentials )
            ->requestAction('POST', 'UserController@do_login');

        $this->assertRedirection( URL::action('Admin\PostsController@index') );
    }

    public function test_should_not_do_login_when_wrong()
    {
        $credentials = array('email'=>'someone@somewhere.com', 'password'=>'wrong');

        $this->withInput( $credentials )
            ->requestAction('POST', 'UserController@do_login');

        $this->assertRedirection( URL::action('Admin\PostsController@login') );
    }

    public function test_should_redirect_logged_login()
    {
        $this->owner();

        $this->requestAction('GET', 'UserController@login');

        $this->assertRedirection( URL::action('Admin\PostsController@index') );
    }

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
