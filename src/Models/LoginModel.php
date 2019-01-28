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

namespace Travianz\Models;

use Travianz\Entity\Request;
use Travianz\Mvc\Model;
use Travianz\Database\Database;
use Travianz\Config\Config;

class LoginModel extends Model
{
	/**
	 * @var Request The received request
	 */
	public $request;

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * The default method to be executed
	 * 
	 * @param Request $request The request made
	 */
	public function default(Request $request)
	{
		$this->request = $request;
	}

	/**
	 * Log into the game
	 * 
	 * @param Request $request The request containing the configuration parameters
	 */
	public function login(Request $request)
	{
		
	}
}
