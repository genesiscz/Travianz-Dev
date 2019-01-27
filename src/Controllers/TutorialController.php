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

use Travianz\Entity\Request;
use Travianz\Exceptions\InvalidParametersException;
use Travianz\Models\TutorialModel;
use Travianz\Mvc\Controller;

class TutorialController extends Controller
{
	public function __construct(TutorialModel $model)
	{
		parent::__construct($model);
	}

	/**
	 * {@inheritDoc}
	 * @see \Travianz\Mvc\Controller::default()
	 */
	public function default(Request $request)
	{
		try
		{
			$this->model->default($request);
		}
		catch (InvalidParametersException $exception)
		{
			$this->model->set($exception);
		}
	}
}