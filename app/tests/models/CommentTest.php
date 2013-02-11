<?php

class CommentTest extends TestCase
{
    
    public function test_get_gravatar()
    {
        $comment = FactoryMuff::create('Comment');

        $this->assertNotNull( $comment->authorGravatar() );
    }

    public function test_send_mail_when_create()
    {
        $owner_user = $this->owner();

        $comment = FactoryMuff::create('Comment');

        $this->assertEquals(MailRepository::lastSent()['destination'], $owner_user->email);
    }

    public function test_posted_at()
    {
        $comment = FactoryMuff::create('Comment');

        $expected = '/\d{2}\/\d{2}\/\d{4}/';

        $matches = ( preg_match($expected, $comment->postedAt()) ) ? true : false;

        $this->assertTrue( $matches );
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
