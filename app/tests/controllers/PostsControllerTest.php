<?php

class PostsControllerTest extends ControllerTestCase{

    public function test_should_index()
    {
        $this->requestAction('GET', 'PostsController@index');

        $this->assertTrue($this->client->getResponse()->isOk());
    }

    public function test_should_show()
    {
        $post = $this->existentPost();

        $this->requestAction('GET', 'PostsController@show',array('slug'=>$post->slug));

        $this->assertTrue($this->client->getResponse()->isOk());
    }

    public function test_should_redirect_when_show_non_existant()
    {
        $this->requestAction('GET', 'PostsController@show',array('slug'=>'non-existant'));

        // The website index location
        $location = 'http://:';

        $this->assertTrue($this->client->getResponse()->isRedirect($location));
    }

    private function existentPost()
    {
        return FactoryMuff::create('Post');
    }
}
