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

}
