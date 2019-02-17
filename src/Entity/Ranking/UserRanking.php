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

namespace Travianz\Entity\Ranking;

use Travianz\Database\IDbConnection;
use Travianz\Entity\User;

final class UserRanking extends Ranking
{
	/**
	 * @var User The User
	 */
	private $user;
	
	/**
	 * @var IDbConnection The database
	 */
	private $database;
	
	public function __construct(IDbConnection $database, User $user)
	{
		parent::__construct();
		$this->database = $database;
		$this->user = $user;
	}
	
	/**
	 * Initialize the User ranking
	 */
	public function init(): void
	{
		$sql = 'SELECT ranking.* 
				  FROM ranking
				  JOIN user_ranking ON ranking.id = user_ranking.ranking_id
				  WHERE user_ranking.user_id = ?';
		
		$userRanking = $this->database->query($sql, $this->user->getID())[0];

		$this->setID($userRanking['id']);
		$this->setOldRank($userRanking['old_rank']);
		$this->setClimbedRanks($userRanking['climbed_ranks']);
		$this->setClimberPoints($userRanking['climber_points']);
		$this->setRaidedResources($userRanking['raided_resources']);
		$this->setAttackingPoints($userRanking['attacking_points']);
		$this->setDefendingPoints($userRanking['defending_points']);
		$this->setTotalAttackingPoints($userRanking['total_attacking_points']);
		$this->setTotalDefendingPoints($userRanking['total_defending_points']);
	}
	
	/**
	 * Create the User ranking
	 */
	public function create(): void
	{
		$sql = 'INSERT INTO ranking (old_rank, climbed_ranks, climber_points, raided_resources, attacking_points, 
											  defending_points, total_attacking_points, total_defending_points)
				  VALUES (?, ?, ?, ?, ?, ?, ?, ?)';

		$this->setID($this->database->query(
				$sql, 
				$this->getOldRank(),
				$this->getClimbedRanks(),
				$this->getClimberPoints(),
				$this->getRaidedResources(),
				$this->getAttackingPoints(),
				$this->getDefendingPoints(),
				$this->getTotalAttackingPoints(),
				$this->getTotalDefendingPoints()));
		
		$sql = 'INSERT INTO user_ranking (user_id, ranking_id)
				  VALUES (?, ?)';
		
		$this->database->query($sql, $this->user->getID(), $this->getID());
	}
}

