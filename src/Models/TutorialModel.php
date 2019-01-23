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

use Travianz\Mvc\Model;
use Travianz\Entity\Request;

class TutorialModel extends Model
{	
	/**
	 * The received request
	 *
	 * @var Request
	 */
	public $request;
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function default(Request $request)
	{
		$this->request = $request;
	}
}
