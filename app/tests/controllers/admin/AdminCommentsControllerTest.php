<?php

class AdminCommentsControllerTest extends ControllerTestCase{
    use TestHelper;

    public function test_should_be_filtered_when_not_owner()
    {
        $this->requestAction('GET', 'Admin\CommentsController@index');

        $this->assertRedirection( URL::to('/') );
    }

    public function test_should_index()
    {
        $this->owner();
        
        $this->requestAction('GET', 'Admin\CommentsController@index');
        $this->assertRequestOk();
    }

    public function test_should_edit()
    {
        $this->owner();

        $comment = $this->existentComment();

        $this->requestAction(
            'GET', 'Admin\CommentsController@edit', array('id'=>$comment->id)
        );

        $this->assertRequestOk();
    }

    public function test_should_not_edit_non_existant()
    {
        $this->owner();

        $this->requestAction(
            'GET', 'Admin\CommentsController@edit', array('id'=>'999')
        );

        $this->assertRedirection( URL::action('Admin\CommentsController@index') );
    }

    public function test_should_update_existant()
    {
        $this->owner();

        $comment = $this->existentComment();
        $input = FactoryMuff::attributesFor('Comment', array('id'=>$comment->id));

        $this->withInput( $input )->requestAction(
            'PUT', 'Admin\CommentsController@update', array('id'=>$comment->id)
        );

        $this->assertRedirection( URL::action('Admin\CommentsController@index') );
    }

    public function test_should_not_update_invalid()
    {
        $this->owner();

        $comment = $this->existentComment();
        $input = array( 'id'=>$comment->id );

        $this->withInput( $input )->requestAction(
            'PUT', 'Admin\CommentsController@update', array('id'=>$comment->id)
        );

        $this->assertRedirection( URL::action('Admin\CommentsController@edit', array('id'=>$comment->id)) );
    }

    public function test_should_destroy()
    {
        $this->owner();

        $comment = $this->existentComment();

        $this->requestAction(
            'DELETE', 'Admin\CommentsController@destroy', array('id'=>$comment->id)
        );

        $this->assertRedirection( URL::action('Admin\CommentsController@index') );
    }

    private function existentComment()
    {
        return FactoryMuff::create('Comment');
    }

}
