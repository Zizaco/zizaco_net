<?php

class CommentsControllerTest extends ControllerTestCase {

    public function test_should_store()
    {
        $page = FactoryMuff::create('Page');
        $input = FactoryMuff::attributesFor('Comment');

        $this->withInput( $input )->requestAction(
            'POST', 'CommentsController@store', array('slug'=>$page->slug)
        );

        $this->assertRedirection( URL::to('post/'.$page->slug.'#comment') );
    }

}
