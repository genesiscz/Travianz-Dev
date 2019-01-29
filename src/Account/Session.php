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
namespace Travianz\Account;

use Travianz\Database\IDbConnection;
use Travianz\Entity\User;
use Travianz\Utils\DateTime;

final class Session implements ISessionBase
{

	/**
	 * @var IDbConnection Database connection to perform queries on
	 */
	private $db;

	/**
	 * @var User The Session user
	 */
	private $user;
	
	/**
	 * @var bool True if the user is logged in, false otherwise
	 */
	private $isLoggedIn;

	public function __construct(IDbConnection $database)
	{
		$this->database = $database;
		$this->start();

		if(isset($_SESSION['user_id']))
		{
			$this->user = new User($this->db, $_SESSION['user_id']);
			$this->user->isLoggedIn = true;
			$this->user->updateLastActivityDate(DateTime::now());
		}
		else $this->destroy();
	}

	/**
	 * {@inheritDoc}
	 * @see \Travianz\Account\ISessionBase::start()
	 */
	public function start() : void
	{
		if(!isset($_SESSION)) session_start();
	}

	/**
	 * {@inheritDoc}
	 * @see \Travianz\Account\ISessionBase::destroy()
	 */
	public function destroy() : void
	{
		if(session_status() == PHP_SESSION_ACTIVE)
		{
			unset($_SESSION);
			session_destroy();
		}
	}

	/**
	 * {@inheritdoc}
	 * @see \Travianz\Account\ISessionBase::logIn()
	 */
	public function logIn(string $username, string $password): bool
	{
		{
			$this->start();
			$_SESSION['user_id'] = $this->user->id;
			setcookie("COOKUSR", $this->user->username, time() + COOKIE_EXPIRE, COOKIE_PATH);
			return true;
		}

		return false;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \Travianz\Account\ISessionBase::sitterLogin()
	 */
	public function sitterLogin(int $userID, string $password) : bool
	{
		
	}

	/**
	 * {@inheritdoc}
	 * @see \Travianz\Account\ISessionBase::logOut()
	 */
	public function logOut() : void
	{
		$this->user = null;

		if(ini_get("session.use_cookies"))
		{
			$params = session_get_cookie_params();
			setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
		}

		$this->stop();
	}

	/**
	 * {@inheritDoc}
	 * @see \Travianz\Account\ISessionBase::getUser()
	 */
	public function getUser(): User
	{
		return $this->user;
	}

	/**
	 * {@inheritDoc}
	 * @see \Travianz\Account\ISessionBase::setUser()
	 */
	public function setUser(User $user) : void
	{
		$this->user = $user;
	}

	/**
	 * {@inheritDoc}
	 * @see \Travianz\Account\ISessionBase::deleteCookies()
	 */
	public static function deleteCookies()
	{
		setcookie('COOKUSR', '', time() - 86400, DIRECTORY_SEPARATOR);
		setcookie('SHOWLEVELS', '', time() - 86400, DIRECTORY_SEPARATOR);
		unset($_COOKIE);
	}
}
