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
use Travianz\Entity\Alliance;

final class AllianceRanking extends Ranking
{
	/**
	 * @var Alliance The Alliance
	 */
	private $alliance;
	
	/**
	 * @var IDbConnection The database
	 */
	private $database;
	
	public function __construct(IDbConnection $database, Alliance $alliance)
	{
		parent::__construct();
		$this->database = $database;
		$this->alliance = $alliance;
	}
	
	public function init()
	{
		$sql = 'SELECT ranking.*
				  FROM ranking
				  JOIN alliance_ranking ON ranking.id = alliance_ranking.ranking_id
				  WHERE alliance_ranking.alliance_id = ?';
		
		$allianceRanking = $this->database->query($sql, $this->alliance->getID())[0];
		
		$this->setID($allianceRanking['id']);
		$this->setOldRank($allianceRanking['old_rank']);
		$this->setClimbedRanks($allianceRanking['climbed_ranks']);
		$this->setClimberPoints($allianceRanking['climber_points']);
		$this->setRaidedResources($allianceRanking['raided_resources']);
		$this->setAttackingPoints($allianceRanking['attacking_points']);
		$this->setDefendingPoints($allianceRanking['defending_points']);
		$this->setTotalAttackingPoints($allianceRanking['total_attacking_points']);
		$this->setTotalDefendingPoints($allianceRanking['total_defending_points']);
	}
	
	/**
	 * Create the Alliance ranking
	 */
	public function create(): void
	{
		$sql = 'INSERT INTO ranking';
		
		$this->setID($this->database->query($sql)[0]);
		
		$sql = 'INSERT INTO alliance_ranking (alliance_id, ranking_id)
				  VALUES (?, ?)';
		
		$this->database->query($sql, $this->alliance->getID(), $this->getID());
	}
}
