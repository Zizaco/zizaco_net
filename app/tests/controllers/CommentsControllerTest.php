<?php

class CommentsControllerTest extends ControllerTestCase {

    public function test_should_store()
    {
        $page = FactoryMuff::create('Page');
        $input = FactoryMuff::attributesFor('Comment');
        
        $input['csrf_token'] = Session::getToken();

        $this->withInput( $input )->requestAction(
            'POST', 'CommentsController@store', array('slug'=>$page->slug)
        );

        $this->assertRedirection( URL::to('post/'.$page->slug.'#comment') );
    }

}
