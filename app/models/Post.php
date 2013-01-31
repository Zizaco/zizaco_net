<?php

use LaravelBook\Ardent\Ardent;

class Post extends Ardent {

    /**
     * Table
     */
    protected $table = 'posts';

    /**
     * Ardent validation rules
     */
    public static $rules = array(
        'title' => 'required',
        'slug' => 'required|alpha_dash',
        'content' => 'required',
        'author_id' => 'required|numeric',
    );

    // Array used in FactoryMuff
    public static $factory = array(
        'title' => 'string',
        'slug' => 'string',
        'content' => 'text',
        'author_id' => 'factory|User',
    );

    /**
     * Belongs to user
     */
    public function author()
    {
        return $this->belongsTo( 'User', 'author_id' );
    }

    /**
     * Post date
     */
    public function postedAt()
    {
        $date_obj =  DateTime::createFromFormat('Y-m-d H:i:s', $this->created_at);

        return $date_obj->format('d/m/Y');
    }
}
