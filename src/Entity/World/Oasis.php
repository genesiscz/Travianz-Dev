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
namespace Travianz\Entity\World;

use Travianz\Database\IDbConnection;

/**
 * @author iopietro
 */
class Oasis extends WorldCell
{
	/**
	 * @var Village The oasis owner's village
	 */
	public $ownerVillage;

	/**
	 * @var string The oasis last units update date
	 */
	public $lastUnitsUpdateDate;

	/**
	 * @var int The oasis existence state
	 */
	private $exist;
	
	/**
	 * @var IDbConnection The database
	 */
	private $database;

	public function __construct(IDbConnection $database, ?int $id = null)
	{
		parent::__construct($id);
		$this->database = $database;
	}

	/**
	 * Initialize the oasis datas
	 */
	public function init(): void
	{
		$sql = 'SELECT world.*, oasis.*, world_loyalty.loyalty, world_loyalty.last_update_date as loyalty_last_update_date
                     world_resource.*, world_storage.*
				  FROM world
				  JOIN oasis ON world.id = oasis.world_id
				  JOIN world_loyalty ON world.id = world_loyalty.world_id
				  JOIN world_resource ON world.id = world_resource.world_id
				  JOIN world_storage ON world.id = world_storage.world_id
				  WHERE world.id = ?';
		
		$oasisDatas = $this->database->query($sql, $this->getID())[0] ?? null;
		
		if ($oasisDatas === null) return;
		
		$this->setCoordinates(new Coordinate(['x' => $oasisDatas['y'], 'y' => $oasisDatas['x']]));
		$this->setType($oasisDatas['type']);
		$this->setOccupationState($oasisDatas['occupied']);
		$this->setLoyalty(new Loyalty($oasisDatas['loyalty'], $oasisDatas['loyalty_last_update_date']));
		$this->setResources(new Resource(
				['wood' => $oasisDatas['wood'], 
				 'clay' => $oasisDatas['clay'],
				 'iron' => $oasisDatas['clay'],
				 'crop' => $oasisDatas['clay']],
				$oasisDatas['last_update_date']));
		$this->setStorages(new Storage(['granary' => $oasisDatas['granary'], 'warehouse' => $oasisDatas['warehouse']]));
	}

	/**
	 * Check if the Oasis exists
	 *
	 * @return bool Returns true if the Oasis exist, false otherwise
	 */
	public function exists(): bool
	{
		return $this->exist;
	}

	/**
	 * Set the Oasis existence state
	 */
	public function setExistence(): void
	{
		$sql = 'SELECT 1
				  FROM oasis
				  WHERE world_id = ?';

		$this->exist = $this->database->query($sql, $this->getID())[0] ?? false;
	}
	
	/**
	 * Get the units strength
	 * 
	 * @return int Returns the units strength
	 */
	public function getUnitsStrength(): int
	{
		return $this->getType();
	}
}