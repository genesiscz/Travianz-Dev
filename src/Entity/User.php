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
namespace Travianz\Entity;

use Travianz\Config\Config;
use Travianz\Database\IDbConnection;
use Travianz\Entity\World\Village;
use Travianz\Utils\DateTime;

class User
{
	/**
	 * @var ?int User's ID
	 */
	private $id;

	/**
	 * @var string The username
	 */
	public $username;

	/**
	 * @var string The User's password
	 */
	public $password;

	/**
	 * @var string The User's email
	 */
	public $email;

	/**
	 * @var int The User's tribe
	 */
	public $tribe;

	/**
	 * @var ?int The User's alliance
	 */
	public $alliance;

	/**
	 * @var int The User's gold
	 */
	public $gold;
	
	/**
	 * @var int The User's units max evasion
	 */
	public $maxEvasion;

	/**
	 * @var int The User's culture points
	 */
	public $culturePoints;

	/**
	 * @var int The User's actual quest
	 */
	public $questNumber;
	
	/**
	 * @var string The User's registration date
	 */
	public $registrationDate;
	
	/**
	 * @var int When the User's beginner protection will end
	 */
	private $beginnerProtectionEndDate;
	
	/**
	 * @var int The User's access level
	 */
	private $accessLevel;

	/**
	 * @var string The vacation end date
	 */
	private $vacationDate;

	/**
	 * @var ?string If the User is deleting, provides the deleting timestamp
	 */
	private $deletingDate;
	
	/**
	 * @ar string The User's last activity date
	 */
	private $lastActivityDate;
	
	/**
	 * @var string The name of the selected graphic pack
	 */
	private $graphicPack;
	
	/**
	 * @var Village The User's selected village
	 */
	private $selectedVillage;

	/**
	 * @var bool True if the User exist, false otherwise
	 */
	private $exist;
	
	/**
	 * @var IDbConnection Database connection to perform queries on
	 */
	private $database;

	/**
	 * @param IDbConnection $database The database
	 * @param ?int $id The User ID
	 */
	public function __construct(IDbConnection $database, ?int $id = null)
	{
		$this->database = $database;
		$this->id = $id;
	}
	
	/**
	 * Initialize the User datas
	 */
	public function init(): void
	{
		$sql = 'SELECT user.*, village_selected.village_id, alliance_member.alliance_id, culture.produced_points, 
							quest.number, vacation.end_date, `delete`.end_date as deleting_date, user_graphic_pack.name
				  FROM user
              LEFT JOIN village_selected ON user.id = village_selected.user_id
				  LEFT JOIN alliance_member ON user.id = alliance_member.user_id
			     LEFT JOIN culture ON user.id = culture.user_id
				  LEFT JOIN quest ON user.id = quest.user_id
			     LEFT JOIN vacation ON user.id = vacation.user_id
				  LEFT JOIN `delete` ON user.id = `delete`.user_id
				  LEFT JOIN user_graphic_pack ON user.id = user_graphic_pack.user_id
				  WHERE user.id = ?';

		$userDatas = $this->database->query($sql, $this->getID())[0] ?? null;

		if ($userDatas === null) return;
		
		$this->setBeginnerProtectionEndDate($userDatas['beginner_protection_end_date']);
		$this->setAccessLevel($userDatas['access_level'] ?? Config::ACCESS_USER);
		
		$this->username = $userDatas['username'];
		$this->password = $userDatas['password'];
		$this->email = $userDatas['email'];	
		$this->tribe = $userDatas['tribe'] ?? 1;
		$this->alliance = $userDatas['alliance_id'] ?? null;
		$this->gold = $userDatas['gold'] ?? 0;
		$this->maxEvasion = $userDatas['maximum_evasion'] ?? 0;
		$this->culturePoints = $userDatas['produced_points'] ?? 0;
		$this->questNumber = $userDatas['number'] ?? 1;
		$this->lastActivityDate = $userDatas['last_activity_date'];
		$this->deletingDate = $userDatas['deleting_date'];
		$this->registrationDate = $userDatas['registration_date'];
		$this->vacationDate = $userDatas['end_date'];
		$this->graphicPack = $userDatas['name'] ?? Config::GP_DEFAULT;
	}
	
	/**
	 * Create the User in the Database
	 */
	public function create()
	{
		$sql = 'INSERT INTO user (username, email, password, tribe, access_level, beginner_protection_end_date, registration_date)
				  VALUES (?, ?, ?, ?, ?, ?, ?)';
		
		$this->id = $this->database->query(
				$sql,
				$this->username,
				$this->email,
				$this->password,
				$this->tribe,
				$this->accessLevel,
				$this->beginnerProtectionEndDate,
				$this->registrationDate);
	}
	
	/**
	 * Check if the User exists
	 * 
	 * @return bool Returns true if the User exist, false otherwise
	 */
	public function exists(): bool
	{
		return $this->exist;
	}
	
	/**
	 * Set the User's existence state
	 */
	public function setExistence(): void
	{
		$sql = 'SELECT 1
				  FROM user
				  WHERE id = ?';
		
		$this->database->query($sql, $this->getID());
	}
	
	/**
	 * Get the Village ID
	 *
	 * @return ?int Returns the User's ID
	 */
	public function getID(): ?int
	{
		return $this->id;
	}
	
	/**
	 * Set the User ID from his username
	 */
	public function setIDFromUsername(): void
	{
		if ($this->username === null) return;
		
		$sql = 'SELECT id
				  FROM user
				  WHERE username = ?';
		
		$this->id = $this->database->query($sql, $this->username)[0]['id'] ?? null;
	}
	
	/**
	 * Set the User ID from his email
	 */
	public function setIDFromEmail(): void
	{
		if ($this->username === null) return;
		
		$sql = 'SELECT id
				  FROM user
				  WHERE email = ?';
		
		$this->id = $this->database->query($sql, $this->email)[0]['id'] ?? null;
	}
	
	/**
	 * Check if the user is a Multihunter
	 *
	 * @return bool Returns true if it's an admin, false otherwise
	 */
	public function isMultiHunter(): bool
	{
		return $this->accessLevel == Config::ACCESS_MH;
	}
	
	/**
	 * Check if the user is an admin
	 *
	 * @return bool Returns true if it's an admin, false otherwise
	 */
	public function isAdmin(): bool
	{
		return $this->accessLevel == Config::ACCESS_ADMIN;
	}

	/**
	 * Check if the user is banned
	 *
	 * @return bool Returns true if the User is banned, false otherwise
	 */
	public function isBanned(): bool
	{
		return $this->accessLevel == Config::ACCESS_BANNED;
	}
	
	/**
	 * Check if the user account has been activated
	 *
	 * @return bool Returns true if the account hasn't been activated, false otherwise
	 */
	public function isNotActivated(): bool
	{
		return $this->accessLevel == Config::ACCESS_AUTH;
	}

	/**
	 * Set the User's access level
	 * 
	 * @param int $accessLevel The access level to be set
	 */
	public function setAccessLevel(int $accessLevel): void
	{
		$this->accessLevel = $accessLevel;
	}
	
	/**
	 * Check if the user is under the beginner protection
	 *
	 * @return bool Returns true if the User is an admin, false otherwise
	 */
	public function isUnderBeginnerProtection(): bool
	{
		return DateTime::get($this->beginnerProtectionEndDate)->getTimestamp() > DateTime::getTimestamp();
	}

	/**
	 * Set the User's beginner protection end date
	 * 
	 * @param string $beginnerProtectionEndDate The date to be set
	 */
	public function setBeginnerProtectionEndDate(string $beginnerProtectionEndDate): void
	{
		$this->beginnerProtectionEndDate = $beginnerProtectionEndDate;
	}
	
	/**
	 * Check if the user is on vacation
	 *
	 * @return bool Returns true if the User is on vaction, false otherwise
	 */
	public function isOnVacation(): bool
	{
		if ($this->vacationDate === null) return false;
		
		return DateTime::get($this->vacationDate)->getTimestamp() > DateTime::getTimestamp();
	}

	/**
	 * Get the end of deletion date if the user started the account deletion process
	 *
	 * @return string Returns the end of deletion date if the user is in deleting
	 */
	public function getDeletingDate(): ?string
	{
		return $this->deletingDate;
	}
	
	/**
	 * Get the selected village
	 *
	 * @return Village Returns the selected village
	 */
	public function getSelectedVillage(): Village
	{
		return $this->selectedVillage;
	}
	
	/**
	 * Set the actual selected village
	 * 
	 * @param Village $newVillage The new village to be set
	 */
	public function changeSelectedVillage(Village $newVillage): void
	{
		if($newVillage->getID() == $this->selectedVillage->getID()) return;

		$sql = 'SELECT 1
				  FROM village
				  WHERE id = ?';

		if($this->database->query($sql, $newVillage->getID())[0])
		{
			$this->selectedVillage = $newVillage;
			
			$sql = 'UPDATE village_selected
				  	  SET village_id = ?
				  	  WHERE user_id = ?';
			
			$this->database->query($sql, $newVillage->getID(), $this->getID());
		}
	}
	
	/**
	 * Get the date of the last User's activity
	 * 
	 * @return string Returns the last User's activity date
	 */
	public function getLastActivityDate(): string
	{
		return $this->lastActivityDate;
	}
	
	/**
	 * Update last User's activity
	 *
	 * @param string $date The date to set
	 */
	public function updateLastActivityDate(string $date): void
	{
		$sql = 'UPDATE user
				  SET last_activity_date = ?
				  WHERE id = ?';
		
		$this->database->query($sql, $date, $this->getID());
		
		$this->lastActivityDate = $date;
	}
	
	/**
	 * Add a referral in the database
	 * 
	 * @param User $referralUser The User to be added
	 */
	public function addReferral(User $referralUser): void
	{
		$sql = 'INSERT INTO user_referral (user_id, referral_id)
				  VALUES (?, ?)';
		
		$this->database->query($sql, $this->getID(), $referralUser->getID());
	}
}
