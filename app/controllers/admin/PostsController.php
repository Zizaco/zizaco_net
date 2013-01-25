<?php namespace Admin;

use Post, Input, Confide, Redirect;

class PostsController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::with('author')->paginate(8);

		$this->layout->content = \View::make('admin.posts.index')
			->with( 'posts', $posts );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = \View::make('admin.posts.create')
			->with( 'action', 'Admin\PostsController@store')
			->with( 'method', 'POST');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$post = new Post;

		$post->title = Input::get( 'title' );
		$post->slug = Input::get( 'slug' );
		$post->content = Input::get( 'content' );
		$post->lean_content = Input::get( 'lean_content' );
		$post->author_id = Confide::user()->id;

		// Save if valid
		if ( $post->save() )
		{
			return Redirect::action('Admin\PostsController@index')
				->with( 'flash', 'Post criado com sucesso!' );
		}
		else
		{
			// Get validation errors (see Ardent package)
            $error = $post->getErrors()->all();

            return Redirect::action('Admin\PostsController@create')
                ->withInput()
                ->with( 'error', $error );
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::find($id);

		$this->layout->content = \View::make('admin.posts.edit')
			->with( 'post', $post )
			->with( 'action', 'Admin\PostsController@update')
			->with( 'method', 'PUT');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @return Response
	 */
	public function update($id)
	{
		$post = Post::find( $id );

		$post->title = Input::get( 'title' );
		$post->slug = Input::get( 'slug' );
		$post->content = Input::get( 'content' );
		$post->lean_content = Input::get( 'lean_content' );

		// Save if valid
		if ( $post->save() )
		{
			return Redirect::action('Admin\PostsController@index')
				->with( 'flash', 'Alterações salvas' );
		}
		else
		{
			// Get validation errors (see Ardent package)
            $error = $post->getErrors()->all();

            return Redirect::action('Admin\PostsController@edit', ['id'=>$id])
                ->withInput()
                ->with( 'error', $error );
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::find($id);

		$post->delete();

		return Redirect::action('Admin\PostsController@index')
                ->with( 'flash', 'Post excluído com sucesso!' );
	}

}
