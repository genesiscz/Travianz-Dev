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

class InstallationModel extends Model
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
	 * Replace every get parameters and generate the config
	 * 
	 * @param Request $request The request containing the configuration parameters
	 */
	public function saveConfig(Request $request)
	{
		$this->request = $request;
		$file = new \SplFileObject(ROOT_DIR . 'var\\config\\config', 'r');
		$configFile = new \SplFileObject(ROOT_DIR . 'config\\config.php', 'w');

		$configText = $file->fread($file->getSize());
		
		$parameters = $this->request->getParameters();

		foreach ($parameters as $key => $value) 
		{
			$configText = str_replace("%" . strtoupper($key) . "%", $value, $configText);
		}
		
		$configFile->fwrite($configText);
	}
}
