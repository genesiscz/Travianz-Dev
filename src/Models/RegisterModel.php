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
use Respect\Validation\Exceptions\NestedValidationException;
use Travianz\Account\Session;
use Travianz\Config\Config;
use Travianz\Data\NewsBoxes\NatarsInfo;
use Travianz\Data\NewsBoxes\ServerInfo;
use Travianz\Database\Database;
use Travianz\Entity\Request;
use Travianz\Entity\User;
use Travianz\Mvc\Model;
use Travianz\Utils\DateTime;
use Travianz\Entity\Ranking\UserRanking;
use Travianz\Entity\World\Village;
use Travianz\Data\Villages\DefaultVillage;

class RegisterModel extends Model
{
	/**
	 * @var Session The User's session
	 */
	private $session;
	
	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * The default method to be called
	 * 
	 * @param Request $request The request made
	 */
	public function default(Request $request)
	{
		$serverInfo = new ServerInfo(Database::getInstance());
		$natarsInfo = new NatarsInfo();
		$this->session = new Session(Database::getInstance());
		
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
		
		if (v::intVal()->min(6)->validate($request->getParameter(0, false))) 
		{
			$this->set(['referralID' => $request->getParameter(0, false)]);
		}

		$this->set(['serverInfo' => $serverInfo, 'natarsInfo' => $natarsInfo, 'session' => &$this->session]);
	}
	
	/**
	 * Register the User
	 * 
	 * @throws NestedValidationException::
	 * @param Request $request The request made
	 */
	public function register(Request $request)
	{
		v::allOf(
			v::key('username', v::length(1))->setTemplate(USERNAME_EMPTY),
			v::key('username', v::length(Config::USERNAME_MIN_LENGTH))->setTemplate(USERNAME_TOO_SHORT),
			v::key('username', v::length(null, Config::USERNAME_MAX_LENGTH))->setTemplate(USERNAME_TOO_LONG),
			v::key('username', v::alnum()->noWhitespace())->setTemplate(INVALID_USERNAME),
			v::key('password', v::length(1))->setTemplate(PASSWORD_EMPTY),
			v::key('password', v::length(Config::PASSWORD_MIN_LENGTH))->setTemplate(PASSWORD_TOO_SHORT),
			v::key('password', v::length(null, Config::PASSWORD_MAX_LENGTH))->setTemplate(PASSWORD_TOO_LONG),
			v::key('password', v::regex('/^(?=.*[A-Z])(?=.*[!@#$&*])(?=.*[0-9])(?=.*[a-z])/'))->setTemplate(PASSWORD_IS_TOO_WEAK),
			v::key('email', v::length(1))->setTemplate(EMAIL_EMPTY),
			v::key('email', v::length(null, Config::EMAIL_MAX_LENGTH))->setTemplate(EMAIL_TOO_LONG),
			v::key('email', v::email())->setTemplate(EMAIL_INVALID),
			v::key('tribe', v::min(1)->max(Config::ALLOW_ALL_TRIBES ? 5 : 3))->setTemplate(TRIBE_EMPTY),
			v::key('sector', v::min(0)->max(4))->setTemplate(SECTOR_EMPTY),
			v::key('rules', v::notBlank())->setTemplate(AGREE_ERROR),
			v::key('referralID', v::intVal()->min(6), false)->setTemplate(INVALID_REFERRAL)
		)->assert($request->getParameters());
		
		$this->createVillage($this->createUser($request->getParameters()));
	}
	
	/**
	 * Create the registered User
	 *
	 * @param array $variables The User's variables to be set
	 * @return User Returns the created User
	 */
	private function createUser(array $variables): User
	{
		$user = new User(Database::getInstance());
		$user->username = $variables['username'];
		$user->email = $variables['email'];
		$user->password = password_hash($variables['password'], PASSWORD_BCRYPT, ['cost' => 12]);
		$user->tribe = $variables['tribe'];
		$user->registrationDate = DateTime::now();
		$user->setBeginnerProtectionEndDate(DateTime::add('T' . Config::PROTECTION_TIME . 'S'));
		$user->setAccessLevel(Config::EMAIL_AUTH ? Config::ACCESS_AUTH : Config::ACCESS_USER);
		
		$user->setIDFromUsername();
		$usernameTaken = $user->getID();
		
		$user->setIDFromEmail();
		$emailTaken = $user->getID();
		
		v::allOf(
				v::key('username', v::nullType())->setTemplate(USERNAME_TAKEN),
				v::key('email', v::nullType())->setTemplate(EMAIL_TAKEN)
		)->assert(['username' => $usernameTaken, 'email' => $emailTaken]);
				
		if (v::intVal()->min(6)->validate($variables['referralID']))
		{
			$referralUser = new User(Database::getInstance(), $variables['referralID']);
			$referralUser->setExistence();
					
			if ($referralUser->exists()) $user->addReferral($referralUser);
		}
				
		$user->create();
				
		$userRanking = new UserRanking(Database::getInstance(), $user);
		$userRanking->create();
				
		Session::setCookie('COOKUSR', $user->username, DateTime::getTimestamp() + 604800);
		
		return $user;
	}
	
	/**
	 * Create a village for the User
	 * 
	 * @param User $user The owner of the Village
	 * @return Village Returns the created Village
	 */
	private function createVillage(User $user): Village
	{
		$village = new DefaultVillage(Database::getInstance());
		$village->name = $user->username + '\'s ' + VILLAGE;
		$village->creationDate = DateTime::now();
		$village->setOwner($user);
		$village->setCapital(true);
		$village->create(0, 0);
		$village->addLoyalty();
		$village->addResources();
		$village->addStorages();
		$village->updateOccupationState(true);
		
		return $village;
	}
}
