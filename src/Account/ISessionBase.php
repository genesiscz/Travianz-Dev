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

use Travianz\Entity\User;

/**
 * Contains the basic Session functions
 *
 * @author iopietro
 */

interface ISessionBase
{
	/**
	 * Start a session
	 */
	public function start(): void;

	/**
	 * Destroy the session
	 */
	public function destroy(): void;

	/**
	 * Log the Session User into the game
	 *
	 * @param string $password The inserted password
	 * @return bool Returns true if the user logged in sucesfully, false otherwise
	 */
	public function logIn(string $password): bool;

	/**
	 * Log into the game as a sitter
	 *
	 * @param string $password The inserted password
	 * @return bool Returns true if the sitter logged in sucesfully, false otherwise
	 */
	public function sitterLogin(string $password): bool;

	/**
	 * Log out from the game
	 */
	public function logOut(): void;

	/**
	 * Get the Session User
	 *
	 * @return User The User object
	 */
	public function getUser(): User;
	
	/**
	 * Set the Session user
	 *
	 * @param User $user The User to be set
	 */
	public function setUser(User $user): void;

	/**
	 * Get the Session Sitter
	 *
	 * @return User The User object
	 */
	public function getSitter(): User;
	
	/**
	 * Set the Session Sitter
	 *
	 * @param User $sitter The Sitter to be set
	 */
	public function setSitter(User $sitter): void;
	
	/**
	 * Check if the user is logged in
	 * 
	 * @return bool Returns true if logged in, false otherwise
	 */
	public function isLoggedIn(): bool;
	
	/**
	 * Set the login status, true if logged in, false otherwise
	 *
	 * @param bool $status
	 */
	public function setLoginStatus(bool $status): void;
	
	/**
	 * Delete a cookie
	 * 
	 * @param string $name The cookie name
	 * @param string $path The cookie path
	 */
	public static function deleteCookie(string $name, string $path = DIRECTORY_SEPARATOR): void;
	
	/**
	 * Set a cookie
	 * 
	 * @param string $name The cookie name
	 * @param string $value The cookie value
	 * @param int $expire The cookie expiration date (in unix timestamp)
	 * @param string $path The cookie path
	 */
	public static function setCookie(string $name, string $value, int $expire, string $path = DIRECTORY_SEPARATOR): void;
}
