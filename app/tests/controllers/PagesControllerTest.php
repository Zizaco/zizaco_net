<?php

class PagesControllerTest extends ControllerTestCase{

    public function test_should_show()
    {
        $page = $this->existentPage();
        
        $this->requestAction(
            'GET', 'PagesController@show', array('slug'=>$page->slug)
        );

        $this->assertRequestOk();
    }

    public function test_should_redirect_when_show_non_existant()
    {
        $this->requestAction('GET', 'PagesController@show',array('slug'=>'non-existant'));
        $this->assertRedirection( URL::action('PagesController@index') );
    }

    private function existentPage()
    {
        return FactoryMuff::create('Page');
    }
}
