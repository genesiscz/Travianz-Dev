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

use Travianz\Config\Config;
use Travianz\Data\NewsBoxes\ServerInfo;
use Travianz\Data\NewsBoxes\NatarsInfo;
use Travianz\Database\Database;
use Travianz\Mvc\Model;
use Travianz\Account\Session;
use Respect\Validation\Validator as v;

class LogoutModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function default()
	{
		$serverInfo = new ServerInfo(Database::getInstance());
		$natarsInfo = new NatarsInfo();
		$session = new Session(Database::getInstance());
		
		if (Config::ENABLE_NEWSBOX1)
		{
			$serverInfo->setTopRanked(Config::STAT_ADMIN, Config::ACCESS_MH);
			$serverInfo->setOnlineUsers();
		}
		
		if (Config::ENABLE_NEWSBOX2)
		{
			$natarsInfo->setArtefactsReleased(Config::ARTEFACTS_RELEASE_DATE_TIME);
			$natarsInfo->setBuildingPlansReleased(Config::BUILDING_PLANS_RELEASE_DATE_TIME);
			$natarsInfo->setWorldWondersReleased(Config::WW_RELEASE_DATE_TIME);
		}
		
		$this->set(['serverInfo' => $serverInfo, 'natarsInfo' => $natarsInfo, 'session' => &$session]);
		
		v::trueVal()->setName('notLoggedIn')->assert($session->isLoggedIn());
		
		$session->logOut();
	}
}
