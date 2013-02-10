<?php

class PostsControllerTest extends ControllerTestCase{

    public function test_should_index()
    {
        $this->requestAction('GET', 'PostsController@index');

        $this->assertRequestOk();
    }

    public function test_should_show()
    {
        $post = $this->existentPost();

        $this->requestAction('GET', 'PostsController@show',array('slug'=>$post->slug));

        $this->assertRequestOk();
    }

    public function test_should_redirect_when_show_non_existant()
    {
        $this->requestAction('GET', 'PostsController@show',array('slug'=>'non-existant'));

        // The website index location
        $location = URL::action('PostsController@index');

        $this->assertRedirection( $location );
    }

    private function existentPost()
    {
        return FactoryMuff::create('Post');
    }
}
