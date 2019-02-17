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
	 * @var User The Session User
	 */
	private $user;
	
	/**
	 * @var User The Logged in Sitter
	 */
	private $sitter;
	
	/**
	 * @var bool True if the user is logged in, false otherwise
	 */
	private $isLoggedIn;
	
	/**
	 * @var IDbConnection Database connection to perform queries on
	 */
	private $database;

	public function __construct(IDbConnection $database)
	{
		$this->database = $database;
		$this->start();

		if(isset($_SESSION['user_id']))
		{
			$this->setLoginStatus(true);
			$this->user = new User($this->database, $_SESSION['user_id']);
			$this->user->updateLastActivityDate(DateTime::now());
			$this->user->init();
		}
		else 
		{
			$this->setLoginStatus(false);
			$this->destroy();
		}
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
	public function logIn(string $password): bool
	{
		if (password_verify($password, $this->getUser()->password))
		{
			$this->start();
			$_SESSION['user_id'] = $this->getUser()->getID();
			self::setCookie("COOKUSR", $this->getUser()->username, DateTime::getTimestamp() + 604800);
			return true;
		}

		return $this->sitterLogin($password);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \Travianz\Account\ISessionBase::sitterLogin()
	 */
	public function sitterLogin(string $password) : bool
	{
		$sql = "SELECT user.id, user.password
				  FROM sitter
				  JOIN user ON sitter.from_user_id = user.id
				  WHERE sitter.to_user_id = ?";

		$sitters = $this->database->query($sql, $this->getUser()->getID());
		
		foreach ($sitters as $sitter) 
		{
			if (password_verify($password, $sitter['password']))
			{
				$this->start();
				$_SESSION['user_id'] = $this->getUser()->getID();
				$_SESSION['sitter_id'] = $sitter['id'];
				self::setCookie("COOKUSR", $this->getUser()->username, DateTime::getTimestamp() + 604800);
				return true;
			}
		}
		
		return false;
	}

	/**
	 * {@inheritdoc}
	 * @see \Travianz\Account\ISessionBase::logOut()
	 */
	public function logOut() : void
	{
		$this->setUser(null);
		$this->setSitter(null);
		$this->setLoginStatus(false);

		if(ini_get("session.use_cookies"))
		{
			self::deleteCookie(session_name(), session_get_cookie_params()['path']);
		}

		$this->destroy();
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
	public function setUser(?User $user) : void
	{
		$this->user = $user;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \Travianz\Account\ISessionBase::getSitter()
	 */
	public function getSitter() : User
	{
		return $this->sitter;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \Travianz\Account\ISessionBase::setSitter()
	 */
	public function setSitter(?User $sitter) : void
	{
		$this->sitter = $sitter;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \Travianz\Account\ISessionBase::isLoggedIn()
	 */
	public function isLoggedIn() : bool
	{
		return $this->isLoggedIn;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \Travianz\Account\ISessionBase::setLoginStatus($status)
	 */
	public function setLoginStatus(bool $status): void
	{
		$this->isLoggedIn = $status;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \Travianz\Account\ISessionBase::deleteCookie()
	 */
	public static function deleteCookie(string $name, string $path = DIRECTORY_SEPARATOR): void
	{
		self::setCookie($name, '', DateTime::getTimestamp() - 86400, $path);
		unset($_COOKIE[$name]);
	}

	/**
	 * {@inheritDoc}
	 * @see \Travianz\Account\ISessionBase::setCookie()
	 */
	public static function setCookie(string $name, string $value, int $expire, string $path = DIRECTORY_SEPARATOR): void
	{
		setcookie($name, $value, $expire, $path);
	}
}
