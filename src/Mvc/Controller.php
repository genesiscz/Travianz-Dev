<?php

namespace Travianz\Mvc;

use Travianz\Entity\Request;

abstract class Controller
{
	/**
	 * @var Model The controller model
	 */
	protected $model = null;

	public function __construct(Model $model)
	{
		$this->model = $model;
	}

	/**
	 * Redirect to the passed URL
	 *
	 * @param string $url
	 */
	protected function redirect($url)
	{
		header('location: ' . $url);
		exit();
	}

	/**
	 * The default method to be called
	 *
	 * @param Request $request
	 *        	The request made
	 */
	abstract public function default(Request $parameters);
}
