<?php

class AdminPagesControllerTest extends ControllerTestCase {
    use TestHelper;

    public function test_should_be_filtered_when_not_owner()
    {
        $this->requestAction('GET', 'Admin\PagesController@index');

        $this->assertRedirection( URL::to('/') );
    }

    public function test_should_index()
    {
        $this->owner();
        
        $this->requestAction('GET', 'Admin\PagesController@index');
        $this->assertRequestOk();
    }

    public function test_should_create()
    {
        $this->owner();
        
        $this->requestAction('GET', 'Admin\PagesController@create');
        $this->assertRequestOk();
    }

    public function test_should_store()
    {
        $this->owner();

        $input = FactoryMuff::attributesFor('Page');
        
        $this->withInput($input)->requestAction('POST', 'Admin\PagesController@store');
        $this->assertRedirection( URL::action('Admin\PagesController@index') );
    }

    public function test_should_not_store_invalid()
    {
        $this->owner();

        $input = FactoryMuff::attributesFor('Page', array('title'=>null));
        
        $this->withInput($input)->requestAction('POST', 'Admin\PagesController@store');
        $this->assertRedirection( URL::action('Admin\PagesController@create') );
    }

    public function test_should_edit()
    {
        $this->owner();

        $page = $this->existentPage();
        
        $this->requestAction(
            'GET', 'Admin\PagesController@edit', array('id'=>$page->id)
        );

        $this->assertRequestOk();
    }

    public function test_should_not_edit_non_existant()
    {
        $this->owner();
        
        $this->requestAction(
            'GET', 'Admin\PagesController@edit', array('id'=>'999')
        );

        $this->assertRedirection( URL::action('Admin\PagesController@index') );
    }

    public function test_should_update()
    {
        $this->owner();

        $page = $this->existentPage();
        $input = FactoryMuff::attributesFor('Page', array('id'=>$page->id));
        
        $this->withInput($input)->requestAction('PUT', 'Admin\PagesController@update', array('id'=>$page->id));
        $this->assertRedirection( URL::action('Admin\PagesController@index') );
    }

    public function test_should_not_update_invalid()
    {
        $this->owner();

        $page = $this->existentPage();
        $input = array('id'=>$page->id);
        
        $this->withInput($input)->requestAction('PUT', 'Admin\PagesController@update', array('id'=>$page->id));
        $this->assertRedirection( URL::action('Admin\PagesController@edit', array('id'=>$page->id)) );
    }

    public function test_should_destroy()
    {
        $this->owner();

        $page = $this->existentPage();
        
        $this->requestAction('DELETE', 'Admin\PagesController@destroy', array('id'=>$page->id));
        $this->assertRedirection( URL::action('Admin\PagesController@index') );
    }

    private function existentPage()
    {
        return FactoryMuff::create('Page');
    }
}
