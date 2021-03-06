<?php

class CommentTest extends TestCase {
    use TestHelper;

    public function test_get_gravatar()
    {
        $comment = FactoryMuff::create('Comment');

        $this->assertNotNull( $comment->authorGravatar() );
    }

    public function test_send_mail_when_create()
    {
        $owner_user = $this->owner();

        $comment = FactoryMuff::create('Comment');

        $sent_email = MailRepository::lastSent();

        $this->assertEquals( $sent_email['destination'], $owner_user->email );
    }

    public function test_posted_at()
    {
        $comment = FactoryMuff::create('Comment');

        $expected = '/\d{2}\/\d{2}\/\d{4}/';

        $matches = ( preg_match($expected, $comment->postedAt()) ) ? true : false;

        $this->assertTrue( $matches );
    }

}
