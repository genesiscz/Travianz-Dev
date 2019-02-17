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

abstract class Ranking
{

	/**
	 * @var ?int The Ranking ID
	 */
	private $id;
	
	/**
	 * @var int The old rank
	 */
	private $oldRank;
	
	/**
	 * @var int Temporary climbed ranks
	 */
	private $climbedRanks;
	
	/**
	 * @var int Temporary climber points
	 */
	private $climberPoints;
	
	/**
	 * @var int Temporary raided resources
	 */
	private $raidedResources;
	
	/**
	 * @var int Temporary attacking points
	 */
	private $attackingPoints;
	
	/**
	 * @var int Temporary defending points
	 */
	private $defendingPoints;
	
	/**
	 * @var int Total attacking points
	 */
	private $totalAttackingPoints;
	
	/**
	 * @var int Total defending points
	 */
	private $totalDefendingPoints;
	
	public function __construct(?int $id = null)
	{
		$this->id = $id;
	}
	
	/**
	 * Get the ID
	 *
	 * @return int Returns the ID
	 */
	public function getID(): int
	{
		return $this->id;
	}
	
	/**
	 * Set the ID
	 * 
	 * @param int $id The ID to be set
	 */
	public function setID(int $id): void
	{
		$this->id = $id;
	}
	
	/**
	 * Get the old rank
	 *
	 * @return int Returns the old rank
	 */
	public function getOldRank(): int
	{
		return $this->oldRank ?? 0;
	}
	
	/**
	 * Set the old rank
	 */
	public function setOldRank(int $oldRank): void
	{
		$this->oldRank = $oldRank;
	}
	
	/**
	 * Get the climbed ranks
	 * 
	 * @return int Returns the climbed ranks
	 */
	public function getClimbedRanks(): int
	{
		return $this->climbedRanks ?? 0;
	}
	
	/**
	 * Set the climbed ranks
	 */
	public function setClimbedRanks(int $climbedRanks): void
	{
		$this->climbedRanks = $climbedRanks;
	}
	
	/**
	 * Get the climber points
	 *
	 * @return int Returns the climber points
	 */
	public function getClimberPoints(): int
	{
		return $this->climberPoints ?? 0;
	}
	
	/**
	 * Set the climber points
	 */
	public function setClimberPoints(int $climberPoints): void
	{
		$this->climberPoints = $climberPoints;
	}
	
	/**
	 * Get the raided resources
	 *
	 * @return int Returns the raided resources
	 */
	public function getRaidedResources(): int
	{
		return $this->raidedResources ?? 0;
	}
	
	/**
	 * Set the raided resources
	 */
	public function setRaidedResources(int $raidedResources): void
	{
		$this->raidedResources = $raidedResources;
	}
	
	/**
	 * Get the attacking points
	 *
	 * @return int Returns the attacking points
	 */
	public function getAttackingPoints(): int
	{
		return $this->attackingPoints ?? 0;
	}
	
	/**
	 * Set the attacking points
	 */
	public function setAttackingPoints(int $attackingPoints): void
	{
		$this->attackingPoints = $attackingPoints;
	}
	
	/**
	 * Get the defending points
	 *
	 * @return int Returns the defending points
	 */
	public function getDefendingPoints(): int
	{
		return $this->defendingPoints ?? 0;
	}
	
	/**
	 * Set the defending points
	 */
	public function setDefendingPoints(int $defendingPoints): void
	{
		$this->defendingPoints = $defendingPoints;
	}
	
	/**
	 * Get total attacking points
	 *
	 * @return int Returns total attacking points
	 */
	public function getTotalAttackingPoints(): int
	{
		return $this->totalAttackingPoints ?? 0;
	}
	
	/**
	 * Set total attacking points
	 */
	public function setTotalAttackingPoints(int $totalAttackingPoints): void
	{
		$this->totalAttackingPoints = $totalAttackingPoints;
	}
	
	/**
	 * Get total defending points
	 *
	 * @return int Returns total defending points
	 */
	public function getTotalDefendingPoints(): int
	{
		return $this->totalDefendingPoints ?? 0;
	}
	
	/**
	 * Set total defending points
	 */
	public function setTotalDefendingPoints(int $totalDefendingPoints): void
	{
		$this->totalDefendingPoints = $totalDefendingPoints;
	}
}
