<?php

class PostTest extends TestCase
{
    public function test_get_author()
    {
        $post = FactoryMuff::create('Post');

        $this->assertEquals($post->author_id, $post->author->id);
    }
}
