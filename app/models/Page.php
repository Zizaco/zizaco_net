<?php

use LaravelBook\Ardent\Ardent;

class Page extends Ardent {

    /**
     * Table
     */
    protected $table = 'pages';

    /**
     * Ardent validation rules
     */
    public static $rules = array(
        'title' => 'required',
        'slug' => 'required|alpha_dash',
        'content' => 'required',
        'author_id' => 'required|numeric',
    );

    /**
     * Belongs to user
     */
    public function author()
    {
        return $this->belongsTo( 'User', 'author_id' );
    }

    /**
     * Renders the menu using cache
     */
    public static function renderMenu()
    {
        $pages = Cache::rememberForever('pages_for_menu', function()
        {
            return Page::select(array('title','slug'))->get()->toArray();
        });

        $result = '';

        foreach( $pages as $page )
        {
            $result .= HTML::action( 'PagesController@show', $page['title'], ['slug'=>$page['slug']] ).' | ';
        }

        return $result;
    }

    /**
     * Forget cache when saved
     */
    public function afterSave( $success )
    {
        if( $success )
            Cache::forget('pages_for_menu');
    }

    /**
     * Forget cache when deleted
     */
    public function delete()
    {
        parent::delete();
        Cache::forget('pages_for_menu');
    }

}
