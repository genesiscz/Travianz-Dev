<?php

/*
 * This file is part of the Travianz Project
 *
 * Source code: <https://github.com/iopietro/Travianz/>
 *
 * Authors: Dzoki <https://github.com/idzoki>
 * iopietro <https://github.com/iopietro>
 *
 * License: GNU GPL-3.0 <https://github.com/iopietro/Travianz/blob/master/LICENSE>
 *
 * Copyright 2019 Travianz Team
 */

namespace Travianz\Config;

abstract class Config
{
	/**
	 * @var string Report back errors (Default: 0)
	 */
	public const ERROR_REPORTING = 'error_reporting (E_ALL ^ E_NOTICE ^ E_DEPRECATED);';

	/**
	 * @var string Hostname of the MySQLi server.
	 */
	public const SQL_HOSTNAME = 'localhost';

	/**
	 * @var string [Optional] server port to connect to. Default: 3306
	 */
	public const SQL_PORT = 3306;

	/**
	 * @var string Name of the database to use.
	 */
	public const SQL_DB = 'travianz';

	/**
	 * @var string Username to be used to connect.
	 */
	public const SQL_USER = 'root';

	/**
	 * @var string Password to be used to connect.
	 */
	public const SQL_PASS = '';

	/**
	 * @var string Website domain name
	 */
	public const DOMAIN = 'http://localhost/';

	/**
	 * @var string Server name
	 */
	public const SERVER_NAME = 'Travianz';

	/**
	 * @var string Default time zone (http://php.net/manual/en/timezones.php)
	 */
	public const TIMEZONE = 'Europe/Rome';

	/**
	 * @var string Server start datetime
	 */
	public const START_DATE_TIME = '2019-01-28 13:15:21';

	/**
	 * @var string Server speed (1 = 1x, 3 = 3x)
	 */
	public const SERVER_SPEED = 1;

	/**
	 * @var string Troop movement speed (1 = 1x, 3 = 3x)
	 */
	public const TROOP_SPEED = 1;

	/**
	 * @var string World size (100 = 100x100)
	 */
	public const WORLD_SIZE = 100;

	/**
	 * @var string Multiplies required Cultural Points
	 */
	public const CP_REQ_MULTIPLIER = 1;

	/**
	 * @var string Multiplies amount that traders can carry
	 */
	public const TRADER_CAPACITY_MULTIPLIER = 1;

	/**
	 * @var string Multiplies cranny storage capacity
	 */
	public const CRANNY_CAPACITY_MULTIPLIER = 1;

	/**
	 * @var string Multiplies storage capacity (1 = 800, 2 = 1600)
	 */
	public const STORAGE_CAPACITY_MULTIPLIER = 1;

	/**
	 * @var int Storage capacity * STORAGE_CAPACITY_MULTIPLIER
	 */
	public const STORAGE_CAPACITY = 800 * STORAGE_CAPACITY_MULTIPLIER;

	/**
	 * @var string Required Main Building level to demolish buildings (Default: 10)
	 */
	public const REQ_DEMOLISH_LEVEL = 10;

	/**
	 * @var bool Enable graphics packs on server
	 */
	public const GP_ENABLE = false;

	/**
	 * @var string Default graphics pack
	 */
	public const GP_DEFAULT = 'gpack/travian_default/';

	/**
	 * @var string Enable quests
	 */
	public const QUEST_ENABLED = true;

	/**
	 * @var string Beginners protection duration (timestamp)
	 */
	public const PROTECTION_TIME = 43200;

	/**
	 * @var string Show WW in statistics
	 */
	public const STAT_WORLD_WONDER = false;

	/**
	 * @var string Show Natars in statistics
	 */
	public const STAT_NATARS = false;

	/**
	 * @var string Show admin accounts in statistics
	 */
	public const STAT_ADMIN = true;

	/**
	 * @var string Multiplies amount of units Natars spawn and attack with (Artefacts, WW..)
	 */
	public const NATARS_UNIT_MULTIPLIER = 1;

	/**
	 * @var string Artefacts spawn datetime
	 */
	public const NATARS_SPAWN_DATE_TIME = '2019-01-28 13:15:21';

	/**
	 * @var string WW villages spawn datetime
	 */
	public const NATARS_WW_SPAWN_DATE_TIME = '2019-01-28 13:15:21';

	/**
	 * @var string Building plan spawn datetime
	 */
	public const NATARS_BUILDINGPLAN_SPAWN_DATE_TIME = '2019-01-28 13:15:21';

	/**
	 * @var string Multiplies how often will oasis respawn units (Default: 1 = 1x)
	 */
	public const OASIS_RESPAWN_MULTIPLIER = 1;

	/**
	 * @var string Multiplies how many animals spawns in oasis by default (Default: 1 = 1x)
	 */
	public const OASIS_TROOP_MULTIPLIER = 1;

	/**
	 * @var string Multiplies wood production of oasis (OASIS_WOOD_MULTIPLIER * SERVER_SPEED)
	 */
	public const OASIS_WOOD_MULTIPLIER = 1;

	/**
	 * @var string Multiplies clay production of oasis (OASIS_CLAY_MULTIPLIER * SERVER_SPEED)
	 */
	public const OASIS_CLAY_MULTIPLIER = 1;

	/**
	 * @var string Multiplies iron production of oasis (OASIS_IRON_MULTIPLIER * SERVER_SPEED)
	 */
	public const OASIS_IRON_MULTIPLIER = 1;

	/**
	 * @var string Multiplies crop production of oasis (OASIS_CROP_MULTIPLIER * SERVER_SPEED)
	 */
	public const OASIS_CROP_MULTIPLIER = 1;

	/**
	 * @var string Oasis wood production per hour
	 */
	public const OASIS_WOOD_PROD = OASIS_WOOD_MULTIPLIER * SERVER_SPEED;

	/**
	 * @var string Oasis wood production per hour
	 */
	public const OASIS_CLAY_PROD = OASIS_CLAY_MULTIPLIER * SERVER_SPEED;

	/**
	 * @var string Oasis wood production per hour
	 */
	public const OASIS_IRON_PROD = OASIS_IRON_MULTIPLIER * SERVER_SPEED;

	/**
	 * @var string Oasis crop production per hour
	 */
	public const OASIS_CROP_PROD = OASIS_CROP_MULTIPLIER * SERVER_SPEED;

	/**
	 * @var string Enables email confirmation after registration
	 */
	public const EMAIL_AUTH = false;

	/**
	 * @var string Opens/closes server for registration
	 */
	public const REGISTRATION_OPEN = true;

	/**
	 * @var string Duration of plus account
	 */
	public const PLUS_ACCOUNT_DURATION = 3600 * 24 * 7;

	/**
	 * @var string Duration of bonus production
	 */
	public const PLUS_PRODUCTION_DURATION = 3600 * 24 * 7;

	/**
	 * @var string How often will medals be given to players
	 */
	public const MEDAL_INTERVAL = 3600 * 24 * 7;

	/**
	 * @var string Log building
	 */
	public const LOG_BUILDING = false;

	/**
	 * @var string Log researches
	 */
	public const LOG_RESEARCHES = false;

	/**
	 * @var string Log IP's
	 */
	public const LOG_IP = false;

	/**
	 * @var string Log admin actions
	 */
	public const LOG_ADMIN = false;

	/**
	 * @var string Log Multihunter actions
	 */
	public const LOG_MULTIHUNTER = false;

	/**
	 * @var string Log troop training
	 */
	public const LOG_TROOP_TRAINING = false;

	/**
	 * @var string Log market movement
	 */
	public const LOG_MARKET_MOVEMENT = false;

	/**
	 * @var string Log gold spent / bought
	 */
	public const LOG_GOLD = false;

	/**
	 * @var string Log login details
	 */
	public const LOG_LOGIN = false;
	
	/**
	 * @var string Log logout details
	 */
	public const LOG_LOGOUT = false;

	/**
	 * @var string Enable newsbox 1
	 */
	public const ENABLE_NEWSBOX1 = false;

	/**
	 * @var string Enable newsbox 2
	 */
	public const ENABLE_NEWSBOX2 = false;

	/**
	 * @var string Enable newsbox 3
	 */
	public const ENABLE_NEWSBOX3 = false;

	/**
	 * @var string Enable limit for messages players can have
	 */
	public const MAILBOX_ENABLE_LIMIT = false;

	/**
	 * @var string Maximum amount of emails players can have (if limit is enabled)
	 */
	public const MAILBOX_LIMIT = 30;

	/**
	 * @var bool Automatically delete players that are inactive for INACTIVE_TIME amount of time
	 */
	public const AUTO_DEL_INACTIVE = false;

	/**
	 * @var int Amount of time after which is player considered inactive.
	 */
	public const INACTIVE_TIME = 3628800;

	/**
	 * @var int Logs players out after X amount of inactivity
	 */
	public const TIMEOUT_TIME = 3600;

	/**
	 * @var bool Allows players to pick any tribe (ex. Natars)
	 */
	public const ALLOW_ALL_TRIBES = false;

	/**
	 * @var int Minimum username lenght
	 */
	public const USRNM_MIN_LENGHT = 3;

	/**
	 * @var int Minimum password lenght
	 */
	public const PASS_MIN_LENGHT = 4;

	/**
	 * @var int User access for banned users
	 */
	public const ACCESS_BANNED = 0;

	/**
	 * @var int User access for users that did not confirm their email
	 */
	public const ACCESS_AUTH = 1;

	/**
	 * @var int User access for regular user
	 */
	public const ACCESS_USER = 2;

	/**
	 * @var int User access for Multihunter
	 */
	public const ACCESS_MH = 3;

	/**
	 * @var int User access for Administrator
	 */
	public const ACCESS_ADMIN = 4;

	/**
	 * @var int time after which cookies expire (Default: 7 days)
	 */
	public const COOKIE_EXPIRE = 604800;

	/**
	 * @var string Cookie path
	 */
	public const COOKIE_PATH = '/';
}
