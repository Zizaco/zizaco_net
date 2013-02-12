<?php namespace Admin;

use Comment;

class CommentsController extends AdminController{
    
    public function index()
    {
        $comments = Comment::with('post')->orderBy('id','desc')->paginate(4);

        $this->layout->content = \View::make('admin.comments.index')
            ->with( 'comments', $comments );
    }

}
