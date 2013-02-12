<?php namespace Admin;

use Comment, Input, Redirect;

class CommentsController extends AdminController{
    
    public function index()
    {
        $comments = Comment::with('post')->orderBy('id','desc')->paginate(4);

        $this->layout->content = \View::make('admin.comments.index')
            ->with( 'comments', $comments );
    }

    public function edit($id)
    {
        $comment = Comment::find($id);

        if(! $comment)
            return Redirect::action('Admin\CommentsController@index');

        $this->layout->content = \View::make('admin.comments.edit')
            ->with( 'comment', $comment );
    }

    public function update($id)
    {
        $comment = Comment::find($id);

        $comment->name = Input::get( 'name' );
        $comment->email = Input::get( 'email' );
        $comment->website = Input::get( 'website' );
        $comment->content = Input::get( 'content' );

        if ( $comment->save() )
        {
            return Redirect::action( 'Admin\CommentsController@index' )
                ->with('flash', 'Alterações salvas');
        }
        else
        {
            // Get validation errors (see Ardent package)
            $error = $comment->getErrors()->all();

            return Redirect::action( 'Admin\CommentsController@edit', array('id'=>$comment->id) )
                ->withInput()
                ->with( 'error', $error );
        }
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);

        $comment->delete();

        return Redirect::action( 'Admin\CommentsController@index' )
            ->with('flash', 'Comentário excluído com sucesso!');
    }

}
