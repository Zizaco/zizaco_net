<?php namespace Admin;

use Comment;

class CommentsController extends AdminController{
    
    public function index()
    {
        $comments = Comment::with('post')->paginate(8);
    }

}
