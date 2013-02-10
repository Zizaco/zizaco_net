<?php

class AdminPostsControllerTest extends ControllerTestCase {

    public function test_should_be_filtered_when_not_owner()
    {
        $this->requestAction('GET', 'Admin\PostsController@index');

        $this->assertRedirection( URL::to('/') );
    }

    public function test_should_index()
    {
        $this->owner();
        
        $this->requestAction('GET', 'Admin\PostsController@index');
        $this->assertRequestOk();
    }

    public function test_should_create()
    {
        $this->owner();
        
        $this->requestAction('GET', 'Admin\PostsController@create');
        $this->assertRequestOk();
    }

    public function test_should_store()
    {
        $this->owner();

        $input = FactoryMuff::attributesFor('Post');
        
        $this->withInput($input)->requestAction('POST', 'Admin\PostsController@store');
        $this->assertRedirection( URL::action('Admin\PostsController@index') );
    }

    public function test_should_not_store_invalid()
    {
        $this->owner();

        $input = FactoryMuff::attributesFor('Post', array('title'=>null));
        
        $this->withInput($input)->requestAction('POST', 'Admin\PostsController@store');
        $this->assertRedirection( URL::action('Admin\PostsController@create') );
    }

    public function test_should_edit()
    {
        $this->owner();

        $post = $this->existentPost();
        
        $this->requestAction(
            'GET', 'Admin\PostsController@edit', array('id'=>$post->id)
        );

        $this->assertRequestOk();
    }

    public function test_should_not_edit_non_existant()
    {
        $this->owner();
        
        $this->requestAction(
            'GET', 'Admin\PostsController@edit', array('id'=>'999')
        );

        $this->assertRedirection( URL::action('Admin\PostsController@index') );
    }

    public function test_should_update()
    {
        $this->owner();

        $post = $this->existentPost();
        $input = FactoryMuff::attributesFor('Post', array('id'=>$post->id));
        
        $this->withInput($input)->requestAction('PUT', 'Admin\PostsController@update', array('id'=>$post->id));
        $this->assertRedirection( URL::action('Admin\PostsController@index') );
    }

    public function test_should_not_update_invalid()
    {
        $this->owner();

        $post = $this->existentPost();
        $input = array('id'=>$post->id);
        
        $this->withInput($input)->requestAction('PUT', 'Admin\PostsController@update', array('id'=>$post->id));
        $this->assertRedirection( URL::action('Admin\PostsController@edit', array('id'=>$post->id)) );
    }

    public function test_should_destroy()
    {
        $this->owner();

        $post = $this->existentPost();
        
        $this->requestAction('DELETE', 'Admin\PostsController@destroy', array('id'=>$post->id));
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

    private function existentPost()
    {
        return FactoryMuff::create('Post');
    }
}
