<?php

class PagesController extends BaseController {

	/**
	 * Display the specified resource.
	 *
	 * @return Response
	 */
	public function show($slug)
	{
		$this->prepareMenu();

		$page = Page::where('slug','=',$slug)->first();

		$this->layout->content = View::make('pages.show')
			->with( 'page', $page );
	}

}
