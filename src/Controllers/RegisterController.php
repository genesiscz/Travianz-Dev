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
use Travianz\Models\RegisterModel;
use Travianz\Mvc\Controller;
use Respect\Validation\Exceptions\NestedValidationException;

class RegisterController extends Controller
{
	public function __construct(RegisterModel $model)
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
		catch (\Exception $exception)
		{

		}
	}
	
	/**
	 * Register the User
	 * 
	 * @param Request $request The request made
	 */
	public function register(Request $request)
	{
		try
		{
			$this->default($request);
			$this->model->register($request);
			$this->redirect('login');
		} 
		catch (NestedValidationException $exception) 
		{
			$this->model->set(['errors' => $exception->findMessages(['username', 'email', 'password', 'tribe', 'sector', 'rules', 'referralID'])]);
		}
	}
}
