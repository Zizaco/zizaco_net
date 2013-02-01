<?php

class CommentsController extends BaseController {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($slug)
	{
		$comment = new Comment;

		$comment->name = Input::get( 'name' );
		$comment->email = Input::get( 'email' );
		$comment->website = Input::get( 'website' );
		$comment->content = Input::get( 'content' );
		$comment->post_id = Input::get( 'post_id' );
		$comment->approved = false;

		// Save if valid
		if ( $comment->save() )
		{
			$message = 'Comentário realizado. O seu comentário será'.
					   ' mostrado após a aprovação.';

			return Redirect::to('post/'.$slug.'#comment')
				->with( 'flash', $message );
		}
		else
		{
			// Get validation errors (see Ardent package)
            $error = $comment->getErrors()->all();

            return Redirect::to('post/'.$slug.'#comment')
                ->withInput()
                ->with( 'error', $error );
		}
	}

}
