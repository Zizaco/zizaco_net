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
     * Array used by FactoryMuff
     */
    public static $factory = array(
        'title' => 'string',
        'slug' => 'string',
        'content' => 'text',
        'author_id' => 'factory|User',
        'display' => '1'
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
            return Page::select(array('title','slug'))
                ->where('display','=', '1')
                ->get()
                ->toArray();
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
    public function afterSave( $success, $forced = false )
    {
        if( Cache::get('pages_for_menu') )
            Cache::forget('pages_for_menu');
    }

    /**
     * Forget cache when deleted
     */
    public function delete()
    {
        parent::delete();

        if( Cache::get('pages_for_menu') )
            Cache::forget('pages_for_menu');
    }

}
