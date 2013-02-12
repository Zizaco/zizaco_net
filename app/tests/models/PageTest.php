<?php

class PageTest extends TestCase
{
    public function test_get_author()
    {
        $page = FactoryMuff::create('Page');

        $this->assertEquals( $page->author_id, $page->author->id );
    }

    public function test_render_menu()
    {
        $pages = array();

        for ($i=0; $i < 4; $i++) { 
            $pages[] = FactoryMuff::create('Page');
        }

        $result = Page::renderMenu();

        foreach ($pages as $page)
        { 
            // Check if each page slug(url) is present in the menu rendered.
            $this->assertGreaterThan(0, (int) strpos($result, $page->slug));
        }

        // Check if cache has been written
        $this->assertNotNull(Cache::get('pages_for_menu'));
    }

    public function test_clear_cache_after_save()
    {
        Cache::put('pages_for_menu','value', 5);

        $page = FactoryMuff::create('Page');

        $this->assertNull(Cache::get('pages_for_menu'));
    }

    public function test_clear_cache_after_delete()
    {
        $page = FactoryMuff::create('Page');

        Cache::put('pages_for_menu','value', 5);

        $page->delete();

        $this->assertNull(Cache::get('pages_for_menu'));
    }
}
