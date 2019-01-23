<?php
/*
 * This file is part of the Travianz Project
 *
 * Source code: <https://github.com/iopietro/Travianz/>
 *
 * Author: Dzoki <https://github.com/idzoki>
 * Author: iopietro <https://github.com/iopietro>
 *
 * License: GNU GPL-3.0 <https://github.com/iopietro/Travianz/blob/master/LICENSE>
 *
 * Copyright 2010 - 2019 Travianz Team
 */

abstract class Config
{	
	/**
	 * @var string Report back errors (Default: 0)
	 */
	const ERROR_REPORTING = "%ERROR_REPORTING%";
	
	/**
	 * @var string Hostname of the MySQLi server.
	 */
	const SQL_HOSTNAME = "%HOSTNAME%";
			
	/**
	 * @var string [Optional] server port to connect to. Default: 3306
	 */		
	const SQL_PORT = "%SQL_PORT%";
	
	/**
	 * @var string Name of the database to use.
	 */
	const SQL_DB = "%SQL_DB%";
	
	/**
	 * @var string Username to be used to connect.
	 */
	const SQL_USER = "%SQL_USER%";
	
	/**
	 * @var string Password to be used to connect.
	 */
	const SQL_PASS = "%SQL_PASS%";
	
	/**
	 * @var string Website domain name
	 */
	const DOMAIN = "%DOMAIN%";

	/**
	 * @var string Server name
	 */
	const SERVER_NAME = "%SERVER_NAME%";
	
	/**
	 * @var string Default time zone (http://php.net/manual/en/timezones.php)
	 */
	const TIMEZONE = "%TIMEZONE%";
	
	/**
	 * @var string Server start date (timestamp)
	 */
	const START_DATE = "%START_DATE%";
	
	/**
	 * @var string Server start time (timestamp)
	 */
	const START_TIME = "%START_TIME%";
	
	/**
	 * @var string Default language
	 */
	const LANG = "%LANG%";
	
	/**
	 * @var string Server speed (1 = 1x, 3 = 3x)
	 */
	const SERVER_SPEED = "%SERVER_SPEED%";
	
	/**
	 * @var string Troop movement speed (1 = 1x, 3 = 3x)
	 */
	const TROOP_SPEED = "%TROOP_SPEED%";
	
	/**
	 * @var string World size (100 = 100x100)
	 */
	const WORLD_SIZE = "%WORLD_SIZE%"; 
	
	/**
	 * @var string Multiplies required Cultural Points
	 */
	const CP_REQ_MULTIPLIER = "%CP_REQ_MULTIPLIER%";
	
	/**
	 * @var string Multiplies amount that traders can carry
	 */
	const TRADER_CAPPACITY_MULTIPLIER = "%TRADER_CAPPACITY_MULTIPLIER%";
	
	/**
	 * @var string Multiplies cranny storage capacity
	 */
	const CRANNY_CAPACITY_MULTIPLIER = "%CRANNY_CAPACITY_MULTIPLIER%";
	
	/**
	 * @var string Multiplies storage capacity (1 = 800, 2 = 1600)
	 */
	const STORAGE_CAPACITY_MULTIPLIER = "%STORAGE_CAPACITY_MULTIPLIER%";
	
	/**
	 * @var int Storage capacity * STORAGE_CAPACITY_MULTIPLIER
	 */
	const STORAGE_CAPACITY = 800 * STORAGE_CAPACITY_MULTIPLIER;
	
	/**
	 * @var string Required Main Building level to demolish buildings (Default: 10)
	 */
	const REQ_DEMOLISH_LEVEL = "%REQ_DEMOLISH_LEVEL%";
	
	/**
	 * @var bool Enable graphics packs on server
	 */
	const GP_ENABLE = false;
	
	/**
	 * @var string Default graphics pack
	 */
	const GP_DEFAULT = "gpack/travian_default/";
	
	/**
	 * @var string Enable quests
	 */
	const QUEST_ENABLED = "%QUEST_ENABLED%";
	
	/**
	 * @var string Beginners protection duration (timestamp)
	 */
	const PROTECTION_TIME = "%PROTECTION_TIME%";
	
	/**
	 * @var string Show WW in statistics
	 */
	const STAT_WORLD_WONDER = "%STAT_WORLD_WONDER%";
			
	/**
	 * @var string Show Natars in statistics
	 */
	const STAT_NATARS = "%STAT_NATARS%"; 
	
	/**
	 * @var string Show admin accounts in statistics
	 */
	const STAT_ADMIN = "%STAT_ADMIN%";
	
	/**
	 * @var string Multiplies amount of units Natars spawn and attack with (Artefacts, WW..)
	 */
	const NATARS_UNIT_MULTIPLIER = "%NATARS_UNIT_MULTIPLIER%";
	
	/**
	 * @var string Artefacts spawn time (timestamp)
	 */
	const NATARS_ARTEFACTS_SPAWN_TIME = "%NATARS_SPAWN_TIME%";
	
	/**
	 * @var string WW villages spawn time (timestamp)
	 */
	const NATARS_WW_SPAWN_TIME = "%NATARS_WW_SPAWN_TIME%";
	
	/**
	 * @var string Building plan spawn time (timestamp)
	 */
	const NATARS_BUILDINGPLAN_SPAWN_TIME = "%NATARS_BUILDINGPLAN_SPAWN_TIME%";
	
	/**
	 * @var string Multiplies how often will oasis respawn units (Default: 1 = 1x)
	 */
	const OASIS_RESPAWN_TIME = "%OASIS_RESPAWN_TIME%"; 
	
	/**
	 * @var string Multiplies how many animals spawns in oasis by default (Default: 1 = 1x)
	 */
	const OASIS_TROOP_MULTIPLIER = "%OASIS_TROOP_MULTIPLIER%"; 
	
	/**
	 * @var string Multiplies wood production of oasis (OASIS_WOOD_MULTIPLIER * SERVER_SPEED)
	 */
	const OASIS_WOOD_MULTIPLIER = "%OASIS_WOOD_MULTIPLIER%";
	
	/**
	 * @var string Multiplies clay production of oasis (OASIS_CLAY_MULTIPLIER * SERVER_SPEED)
	 */
	const OASIS_CLAY_MULTIPLIER = "%OASIS_CLAY_MULTIPLIER%";
	
	/**
	 * @var string Multiplies iron production of oasis (OASIS_IRON_MULTIPLIER * SERVER_SPEED)
	 */
	const OASIS_IRON_MULTIPLIER = "%OASIS_IRON_MULTIPLIER%";
	
	/**
	 * @var string Multiplies crop production of oasis (OASIS_CROP_MULTIPLIER * SERVER_SPEED)
	 */
	const OASIS_CROP_MULTIPLIER = "%OASIS_CROP_MULTIPLIER%";
	
	/**
	 * @var string Oasis wood production per hour
	 */
	const OASIS_WOOD_PROD = OASIS_WOOD_MULTIPLIER * SERVER_SPEED;
	
	/**
	 * @var string Oasis wood production per hour
	 */
	const OASIS_CLAY_PROD = OASIS_CLAY_MULTIPLIER * SERVER_SPEED;
	
	/**
	 * @var string Oasis wood production per hour
	 */
	const OASIS_IRON_PROD = OASIS_IRON_MULTIPLIER * SERVER_SPEED;
	
	/**
	 * @var string Oasis crop production per hour
	 */
	const OASIS_CROP_PROD = OASIS_CROP_MULTIPLIER * SERVER_SPEED;
	
	/**
	 * @var string Enables email confirmation after registration
	 */
	const EMAIL_AUTH = "%EMAIL_AUTH%";
	
	/**
	 * @var string Opens/closes server for registration
	 */
	const REGISTRATION_STATUS = "%REGISTRATION_STATUS%";
	
	/**
	 * @var string Duration of plus account
	 */
	const PLUS_ACCOUNT_DURATION = "%PLUS_ACCOUNT_DURATION%";
	
	/**
	 * @var string Duration of bonus production
	 */
	const PLUS_PRODUCTION_DURATION = "%PLUS_PRODUCTION_DURATION%";
	
	/**
	 * @var string How often will medals be given to players
	 */
	const MEDAL_INTERVAL = "%MEDAL_INTERVAL%";
	
	/**
	 * @var string Log building
	 */
	const LOG_BUILDING = "%LOG_BUILDING%";
	
	/**
	 * @var string Log researches
	 */
	const LOG_RESEARCHES = "%LOG_RESEARCHES%";
	
	/**
	 * @var string Log IP's
	 */
	const LOG_IP = "%LOG_IP%";
	
	/**
	 * @var string Log admin actions
	 */
	const LOG_ADMIN = "%LOG_ADMIN%";
	
	/**
	 * @var string Log Multihunter actions
	 */
	const LOG_MULTIHUNTER = "%LOG_MULTIHUNTER%";
	
	/**
	 * @var string Log reports
	 */
	const LOG_REPORTS = "%LOG_REPORTS%";
	
	/**
	 * @var string Log troop training
	 */
	const LOG_TROOP_TRAINING = "%LOG_TROOP_TRAINING%";
	
	/**
	 * @var string Log market movement
	 */
	const LOG_MARKET_MOVEMENT = "%LOG_MARKET_MOVEMENT%";
	
	/**
	 * @var string Log gold spent / bought
	 */
	const LOG_GOLD = "%LOG_GOLD%";
	
	/**
	 * @var string Log login and logout details
	 */
	const LOG_LOGIN_LOGOUT = "%LOG_LOGIN_LOGOUT%";
	
	/**
	 * @var string Enable newsbox 1
	 */
	const ENABLE_NEWSBOX1 = "%ENABLE_NEWSBOX1%";
	
	/**
	 * @var string Enable newsbox 2
	 */
	const ENABLE_NEWSBOX2 = "%ENABLE_NEWSBOX2%";
	
	/**
	 * @var string Enable newsbox 3
	 */
	const ENABLE_NEWSBOX3 = "%ENABLE_NEWSBOX3%";
	
	/**
	 * @var string Enable limit for messages players can have
	 */
	const MAILBOX_ENABLE_LIMIT = "%MAILBOX_ENABLE_LIMIT%";
	
	/**
	 * @var string Maximum amount of emails players can have (if limit is enabled)
	 */
	const MAILBOX_LIMIT = "%MAILBOX_LIMIT%";
	
	/**
	 * @var bool Automatically delete players that are inactive for INACTIVE_TIME amount of time
	 */
	const AUTO_DEL_INACTIVE = false;
	
	/**
	 * @var int Amount of time after which is player considered inactive.
	 */
	const INACTIVE_TIME = 3628800;
	
	/**
	 * @var int Logs players out after X amount of inactivity
	 */
	const TIMEOUT_TIME = 3600;
	
	/**
	 * @var bool Allows players to pick any tribe (ex. Natars)
	 */
	const ALLOW_ALL_TRIBES = false;
	
	/**
	 * @var int Minimum username lenght
	 */
   const USRNM_MIN_LENGHT = 3;
   
   /**
    * @var int Minimum password lenght
    */
   const PASS_MIN_LENGHT = 4;
   
   /**
    * @var int User access for banned users
    */
   const ACCESS_BANNED = 0;
   
   /**
    * @varint User access for users that did not confirm their email
    */
   const ACCESS_AUTH = 1;
   
   /**
    * @var int User access for regular user
    */
   const ACCESS_USER = 2;
   
   /**
    * @var int User access for Multihunter
    */
   const ACCESS_MH = 8;
   
   /**
    * @var int User access for Administrator
    */
   const ACCESS_ADMIN = 9;
   
   /**
    * @var int time after which cookies expire (Default: 7 days)
    */
   const COOKIE_EXPIRE = 604800;
   
   /**
    * @var string Cookie path
    */
	const COOKIE_PATH = "/";
}

?>
