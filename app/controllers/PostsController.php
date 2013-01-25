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

		$posts = Post::with('author')->orderBy('id','desc')->paginate(8);

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
		
		$post = Post::where('slug','=',$slug)->first();

		$this->layout->content = View::make('posts.show')
			->with( 'post', $post );
	}

}
