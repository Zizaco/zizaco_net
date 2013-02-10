<?php

class PostsControllerTest extends TestCase{

    public function test_should_index()
    {
        $crawler = $this->client->request('GET', URL::action('PostsController@index'));

        $this->assertTrue($this->client->getResponse()->isOk());
    }

    public function test_should_show()
    {
        $post = $this->existentPost();

        $crawler = $this->client->request(
            'GET',
            URL::action('PostsController@show', array('slug'=>$post->slug))
        );

        $this->assertTrue($this->client->getResponse()->isOk());
    }

    public function test_should_redirect_when_show_non_existant()
    {
        $crawler = $this->client->request(
            'GET',
            URL::action('PostsController@show', array('slug'=>'non-existant'))
        );

        // The website index location
        $location = 'http://:';

        $this->assertTrue($this->client->getResponse()->isRedirect($location));
    }

    private function existentPost()
    {
        return FactoryMuff::create('Post');
    }
}
