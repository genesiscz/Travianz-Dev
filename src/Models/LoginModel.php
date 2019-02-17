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

use Respect\Validation\Validator as v;
use Travianz\Account\Session;
use Travianz\Config\Config;
use Travianz\Data\NewsBoxes\ServerInfo;
use Travianz\Database\Database;
use Travianz\Entity\Request;
use Travianz\Mvc\Model;
use Travianz\Entity\User;
use Respect\Validation\Exceptions\NestedValidationException;
use Travianz\Data\NewsBoxes\NatarsInfo;

class LoginModel extends Model
{	
	/**
	 * @var Session $session The User's session
	 */
	private $session;
	
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * The default method to be executed
	 * 
	 * @param Request $request The request made
	 */
	public function default()
	{
		$serverInfo = new ServerInfo(Database::getInstance());
		$natarsInfo = new NatarsInfo();
		$this->session = new Session(Database::getInstance());

		$serverInfo->setStartTime(Config::START_DATE_TIME);
		
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

		$this->set(['serverInfo' => $serverInfo, 'natarsInfo' => $natarsInfo, 'session' => &$this->session]);
	}

	/**
	 * Log the User into the game
	 * 
	 * @param Request $request The request containing the configuration parameters
	 * @throws NestedValidationException Throws it in case of error
	 */
	public function login(Request $request): void
	{
		v::keySet(
			v::key('username', v::length(1)->setTemplate(USERNAME_EMPTY)),
			v::key('password', v::length(1)->setTemplate(PASSWORD_EMPTY))
		)->assert($request->getParameters());
		
		$user = new User(Database::getInstance());
		$user->username = $request->getParameter('username');
		$user->setIDFromUsername();

		v::notBlank()->setName('username')->setTemplate(USER_NOT_FOUND)->assert($user->getID());
				
		$user->init();
		$this->session->setUser($user);

		v::falseVal()->setName('vacation')->setTemplate(USER_ON_VACATION)->assert($this->session->getUser()->isOnVacation());
		v::falseVal()->setName('email')->setTemplate(EMAIL_NOT_VERIFIED)->assert($this->session->getUser()->isNotActivated());
		
		$this->session->setLoginStatus($this->session->logIn($request->getParameter('password')));

		v::trueVal()->setName('password')->setTemplate(PASSWORD_MISMATCH)->assert($this->session->isLoggedIn());
	}
	
	/**
	 * Delete the game-related cookies
	 */
	public function deleteCookies(): void
	{
		Session::deleteCookie('COOKUSR');
		Session::deleteCookie('SHOWLEVELS');
	}
}
