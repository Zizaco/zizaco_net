<?php namespace Admin;

use Page, Input, Confide, Redirect;

class PagesController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pages = Page::with('author')->paginate(8);

		$this->layout->content = \View::make('admin.pages.index')
			->with( 'pages', $pages );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = \View::make('admin.pages.create')
			->with( 'action', 'Admin\PagesController@store')
			->with( 'method', 'POST');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$page = new Page;

		$page->title = Input::get( 'title' );
		$page->slug = Input::get( 'slug' );
		$page->content = Input::get( 'content' );
		$page->author_id = Confide::user()->id;
		$page->display = Input::get( 'display' );

		// Save if valid
		if ( $page->save() )
		{
			return Redirect::action('Admin\PagesController@index')
				->with( 'flash', 'Pagina criada com sucesso!' );
		}
		else
		{
			// Get validation errors (see Ardent package)
            $error = $page->errors()->all();

            return Redirect::action('Admin\PagesController@create')
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
		$page = Page::find($id);

		if(! $page)
			return Redirect::action('Admin\PagesController@index');

		$this->layout->content = \View::make('admin.pages.edit')
			->with( 'page', $page )
			->with( 'action', 'Admin\PagesController@update')
			->with( 'method', 'PUT');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @return Response
	 */
	public function update($id)
	{
		$page = Page::find( $id );

		$page->title = Input::get( 'title' );
		$page->slug = Input::get( 'slug' );
		$page->content = Input::get( 'content' );
		$page->display = Input::get( 'display' );

		// Save if valid
		if ( $page->save() )
		{
			return Redirect::action('Admin\PagesController@index')
				->with( 'flash', 'Alterações salvas' );
		}
		else
		{
			// Get validation errors (see Ardent package)
            $error = $page->errors()->all();

            return Redirect::action('Admin\PagesController@edit', ['id'=>$id])
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
		$page = Page::find($id);

		$page->delete();

		return Redirect::action('Admin\PagesController@index')
                ->with( 'flash', 'Pagina excluída com sucesso!' );
	}

}
