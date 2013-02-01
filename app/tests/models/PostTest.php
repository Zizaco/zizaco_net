<?php

class PostTest extends TestCase
{
    public function test_relation_with_autor()
    {
        $post = FactoryMuff::create('Post');

        $this->assertEquals( $post->author_id, $post->author->id );
    }

    public function test_posted_at()
    {
        $post = FactoryMuff::create('Post');

        $expected = '/\d{2}\/\d{2}\/\d{4}/';

        $matches = ( preg_match($expected, $post->postedAt()) ) ? true : false;

        $this->assertTrue( $matches );
    }
}
