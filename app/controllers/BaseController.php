<?php

class BaseController extends Controller {

	protected $layout = 'layouts.master';

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	protected function prepareMenu()
	{		
		$this->layout->with( 'menuitens', Page::renderMenu() );
	}

}
