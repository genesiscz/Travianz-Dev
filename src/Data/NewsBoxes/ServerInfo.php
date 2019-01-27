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

namespace Travianz\Data\NewsBoxes;

use Travianz\Database\Database;
use Travianz\Database\IDbConnection;
use Travianz\Entity\NewsBox;
use Travianz\Utils\DateTime;
use Travianz\Config\Config;

final class ServerInfo extends NewsBox
{
	/**
	 * @var Database The database
	 */
	private $database;
	
	public function __construct(IDbConnection $database)
	{
		parent::__construct();
		$this->database = $database;
	}

	/**
	 * Get the username of the biggest user on the server
	 * 
	 * @return string Returns the username of the biggest user on the server
	 */
	public function getTopRanked() : string
	{
		return $this->getData('topRanked');
	}

	/**
	 * Set the biggest user on the server
	 */
	public function setTopRanked() : void
	{
		$sql = 'SELECT user.username
              FROM user, user_ranking, ranking
              WHERE user.deleted = 0 AND
					 	  user.id = user_ranking.user_id AND
					 	  user_ranking.ranking_id = ranking.id AND
					     ' . (!Config::ACCESS_ADMIN ? ' user.access_level < ' . Config::ACCESS_MH . ' AND ' : '') . '
						  user.id NOT IN (2, 3, 4) AND 
						  ranking.old_rank > 0 
				  ORDER BY ranking.old_rank ASC 
				  LIMIT 1';

		$this->addData('topRanked', $this->database->query($sql)[0]['username'] ?? 'Nobody');
	}

	/**
	 * Get the amount of online users
	 * 
	 * @return int Returns the online users
	 */
	public function getOnlineUsers() : int
	{
		return $this->getData('onlineUsers');
	}
	
	/**
	 * Set the amount of online users
	 */
	public function setOnlineUsers() : void
	{
		$sql = 'SELECT Count(*) AS Total
              FROM user
              WHERE last_update_date > ?';

		$this->addData('onlineUsers', $this->database->query($sql, DateTime::sub('T5M'))[0]['Total'] ?? 0);
	}

	/**
	 * Get the users amount
	 *
	 * @return int Returns the users amount
	 */
	public function getTotalUsers() : int
	{
		return $this->getData('totalUsers');
	}
	
	/**
	 * Set the users amount
	 */
	public function setTotalUsers() : void
	{
		$sql = 'SELECT Count(*) AS Total
              FROM user';

		$this->addData('totalUsers', $this->database->query($sql)[0]['Total'] ?? 0);

	}

	/**
	 * Get the active users amount
	 *
	 * @return int Returns the active users amount
	 */
	public function getActiveUsers() : int
	{
		return $this->getData('activeUsers');
	}
	
	/**
	 * Set the active users amount
	 */
	public function setActiveUsers() : void
	{
		$sql = 'SELECT Count(*) AS Total
              FROM user
              WHERE last_update_date > ?';

		$this->addData('activeUsers', $this->database->query($sql, DateTime::sub('1D'))[0]['Total'] ?? 0);
	}
}
