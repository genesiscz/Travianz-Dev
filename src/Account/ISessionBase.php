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
	 * Log the user into the game
	 *
	 * @param string $password The user's password
	 * @param string $username The user who wants to log in
	 * @return bool Returns true if the user logged in sucesfully, false otherwise
	 */
	public function logIn(string $username, string $password): bool;

	/**
	 * Log into the game as a sitter
	 *
	 * @param int $userID The owner user id
	 * @param string $password The sitter password
	 * @return bool Returns true if the sitter logged in sucesfully, false otherwise
	 */
	public function sitterLogin(): bool;

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
	 * Deletes all game related cookies
	 */
	public static function deleteCookies(): void;
}
