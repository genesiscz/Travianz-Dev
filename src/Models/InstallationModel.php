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
		$file = new \SplFileObject(ROOT_DIR . 'config\\config', 'r');
		$configFile = new \SplFileObject(ROOT_DIR . 'src\\Config\\Config.php', 'w');

		$configText = $file->fread($file->getSize());
		
		$parameters = $request->getParameters();

		foreach ($parameters as $key => $value) 
		{
			$configText = str_replace("%" . strtoupper($key) . "%", $value, $configText);
		}
		
		$configFile->fwrite($configText);
	}
	
	/**
	 * Create the database structure
	 * 
	 * @param Request $request The request made
	 */
	public function createDatabase(Request $request)
	{
		$file = new \SplFileObject(ROOT_DIR . 'var\\sql\\struct.sql', 'r');
		
		$databaseStructure = $file->fread($file->getSize());
		
		set_time_limit(0);
		
		Database::getInstance()->multiQuery($databaseStructure);
	}
	
	/**
	 * Create the database structure
	 *
	 * @param Request $request The request made
	 */
	public function createWorld(Request $request)
	{
		$worldFile = new \SplFileObject(ROOT_DIR . 'var\\sql\\datagen-world-data.sql', 'r');
		$oasisFile = new \SplFileObject(ROOT_DIR . 'var\\sql\\datagen-oasis-troops-gen.sql', 'r');

		$worldData = str_replace(
				['%WORLD_SIZE%', '%STORAGE_CAPACITY_MULTIPLIER%', '%OASIS_TROOP_MULTIPLIER%'], 
				[Config::WORLD_SIZE, Config::STORAGE_CAPACITY_MULTIPLIER, Config::OASIS_TROOP_MULTIPLIER], 
				$worldFile->fread($worldFile->getSize())
		);
		
		$oasisTroops = str_replace(['%OASIS_TROOP_MULTIPLIER%'], [Config::OASIS_TROOP_MULTIPLIER], $oasisFile->fread($oasisFile->getSize()));

		set_time_limit(0);		

		Database::getInstance()->multiQuery($worldData . ' ; ' . $oasisTroops);
	}
	
	/**
	 * Create the Support, Nature, Taskmaster and Multihunter accounts
	 *
	 * @param Request $request The request made
	 */
	public function createAccounts(Request $request)
	{
		$file = new \SplFileObject(ROOT_DIR . 'var\\sql\\datagen-accounts.sql', 'r');
		
		$accountsData = str_replace(
				['%SUPPORT_PASSWORD%', '%SUPPORT_ACCESS_LEVEL%', '%MULTIHUNTER_PASSWORD%', '%MULTIHUNTER_ACCESS_LEVEL%', '%MULTIHUNTER_TRIBE%'],
				[
					password_hash($request->getParameters()['multihunter_password'], PASSWORD_BCRYPT, ['cost' => 12]), 
					Config::ACCESS_MH, 
					password_hash($request->getParameters()['support_password'], PASSWORD_BCRYPT, ['cost' => 12]), 
					Config::ACCESS_MH,
					$request->getParameters()['multihunter_tribe']
				],
				$file->fread($file->getSize())
		);
		
		set_time_limit(0);
		
		Database::getInstance()->multiQuery($accountsData);
	}
}
