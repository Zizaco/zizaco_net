<?php

use LaravelBook\Ardent\Ardent;

class Post extends Ardent
{

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

    /**
     * Array used by FactoryMuff
     */
    public static $factory = array(
        'title' => 'string',
        'slug' => 'string',
        'content' => 'text',
        'author_id' => 'factory|User', // This will return the id of a existent User.
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
     * Has many commments
     */
    public function comments()
    {
        return $this->hasMany( 'Comment', 'post_id' );
    }

    /**
     * Post date
     *
     * @return string
     */
    public function postedAt()
    {
        $date_obj =  $this->created_at;

        if (is_string($this->created_at))
            $date_obj =  DateTime::createFromFormat('Y-m-d H:i:s', $date_obj);

        return $date_obj->format('d/m/Y');
    }
}
