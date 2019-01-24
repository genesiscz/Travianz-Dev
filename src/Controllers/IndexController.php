<?php

/*
 * This file is part of the Travianz Project
 *
 * Source code: <https://github.com/iopietro/Travianz/>
 *
 * Author: iopietro <https://github.com/iopietro>
 *
 * License: GNU GPL-3.0 <https://github.com/iopietro/Travianz/blob/master/LICENSE>
 *
 * Copyright 2019 Travianz Team
 */

namespace Travianz\Controllers;

use Travianz\Mvc\Controller;
use Travianz\Models\IndexModel;
use Travianz\Exceptions\InvalidParametersException;
use Travianz\Entity\Request;

class IndexController extends Controller
{
	public function __construct(IndexModel $model)
	{
		parent::__construct($model);
	}

	/**
	 * {@inheritDoc}
	 * @see \Travianz\Mvc\Controller::default()
	 */
	public function default(string $methodName, Request $request)
	{
		try
		{
			$this->model->$methodName($request);
		}
		catch (InvalidParametersException $exception)
		{
			$this->model->set($exception);
		}
	}
}
