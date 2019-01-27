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
use Travianz\Models\InstallationModel;
use Travianz\Mvc\Controller;

class InstallationController extends Controller
{
	public function __construct(InstallationModel $model)
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
	
	/**
	 * Save the installation config
	 * 
	 * @param Request $request The request made
	 */
	public function saveConfig(Request $request)
	{
		try
		{
			$this->model->saveConfig($request);
		}
		catch (InvalidParametersException $exception)
		{
			$this->model->set($exception);
		}
	}
	
	/**
	 * Create the database structure
	 *
	 * @param Request $request The request made
	 */
	public function createDatabase(Request $request)
	{
		try
		{
			$this->model->createDatabase($request);
		}
		catch (InvalidParametersException $exception)
		{
			$this->model->set($exception);
		}
	}

	/**
	 * Create the world structure
	 *
	 * @param Request $request The request made
	 */
	public function createWorld(Request $request)
	{
		try
		{
			$this->model->createWorld($request);
		}
		catch (InvalidParametersException $exception)
		{
			$this->model->set($exception);
		}
	}
	
	/**
	 * Create the Support, Nature, Taskmaster and Multihunter accounts
	 *
	 * @param Request $request The request made
	 */
	public function createAccounts(Request $request)
	{
		try
		{
			$this->model->createAccounts($request);
		}
		catch (InvalidParametersException $exception)
		{
			$this->model->set($exception);
		}
	}
}
