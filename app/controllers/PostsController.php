<?php

class PostsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->prepareMenu();

		$posts = Post::with('author')
			->where('display','=', '1')
			->orderBy('id','desc')
			->paginate(8);

		$this->layout->content = View::make('posts.index')
			->with( 'posts', $posts );
	}

	/**
	 * Display the specified resource.
	 *
	 * @return Response
	 */
	public function show($slug)
	{
		$this->prepareMenu();
		
		$post = Post::with('author', 'comments')
			->where('slug','=',$slug)
			->first();

		if(! $post)
		{
			return Redirect::action('PostsController@index');
		}

		$this->layout->content = View::make('posts.show')
			->with( 'post', $post );
	}

}
