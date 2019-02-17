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
use Travianz\Models\LoginModel;
use Travianz\Mvc\Controller;
use Respect\Validation\Exceptions\NestedValidationException;

class LoginController extends Controller
{
	public function __construct(LoginModel $model)
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
			$this->model->default();
		}
		catch (\Exception $exception)
		{
			
		}
	}
	
	/**
	 * Log into the game
	 * 
	 * @param Request $request The request made
	 */
	public function login(Request $request)
	{
		try
		{
			$this->model->default($request);
			$this->model->login($request);
			$this->redirect('village');
		}
		catch (NestedValidationException $exception)
		{
			$this->model->set(['errors' => $exception->findMessages(['username', 'password', 'vacation', 'email'])]);
		}
	}
	
	/**
	 * Delete the game-related cookies
	 * 
	 * @param Request $request The request made
	 */
	public function deleteCookies(Request $request)
	{
		try
		{
			$this->model->default($request);
			$this->model->deleteCookies();
		}
		catch (\Exception $exception)
		{

		}
	}
}
