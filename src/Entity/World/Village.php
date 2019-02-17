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
use Travianz\Entity\User;

class Village extends WorldCell
{

	/**
	 * @var string The Village name
	 */
	public $name;

	/**
	 * @var int The Village population
	 */
	public $population;

	/**
	 * @var string The village culture points production
	 */
	public $culturePointsProduction;

	/**
	 * @var string The Village creation date
	 */
	public $creationDate;
	
	/**
	 * @var bool True if the Village is capital, false otherwise
	 */
	private $capital;
	
	/**
	 * @var bool True if the evasion is enabled, false otherwise
	 */
	private $evasion;

	/**
	 * @var User The Village owner
	 */
	private $owner;

	/**
	 * @var bool True if the Village exist, false otherwise
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
	 * Initialize the Village datas
	 */
	public function init(): void
	{
		$sql = 'SELECT world.*, village.*, world_loyalty.loyalty, world_loyalty.last_update_date as loyalty_last_update_date
                     world_resource.*, world_storage.*
				  FROM world
				  JOIN village ON world.id = village.world_id
				  JOIN world_loyalty ON world.id = world_loyalty.world_id
				  JOIN world_resource ON world.id = world_resource.world_id
				  JOIN world_storage ON world.id = world_storage.world_id
				  WHERE world.id = ?';

		$villageDatas = $this->database->query($sql, $this->getID())[0] ?? null;
		
		if ($villageDatas === null) return;
		
		$this->setCoordinates(new Coordinate(['x' => $villageDatas['y'], 'y' => $villageDatas['x']]));
		$this->setType($villageDatas['type']);
		$this->setOccupationState($villageDatas['occupied']);
		$this->setCapital($villageDatas['capital']);
		$this->setEvasion($villageDatas['evasion']);
		$this->setLoyalty($villageDatas['loyalty']);
		$this->setLoyalty(new Loyalty($villageDatas['loyalty'], $villageDatas['loyalty_last_update_date']));
		$this->setResources(new Resource(
				['wood' => $villageDatas['wood'],
						'clay' => $villageDatas['clay'],
						'iron' => $villageDatas['clay'],
						'crop' => $villageDatas['clay']],
				$villageDatas['last_update_date']));
		$this->setStorages(new Storage(['granary' => $villageDatas['granary'], 'warehouse' => $villageDatas['warehouse']]));
		
		$this->name = $villageDatas['name'];
		$this->population = $villageDatas['population'];
		$this->culturePointsProduction = $villageDatas['culture_points_production'];
		$this->creationDate = $villageDatas['creation_date'];
	}

	/**
	 * Add the Village into the database
	 * 
	 * @param float $minRadius The minimum radius at which the village should be located
	 * @param float $maxRadius The maximum radius at which the village should be located
	 */
	public function create(float $minRadius, float $maxRadius): void
	{
		$sql = 'SELECT id
				  FROM world
				  WHERE IF(? < 0, x <= 0, x >= 0 AND
						  IF(? < 0, y <= 0, y >= 0 AND
						  (POWER(x, 2) + POWER(y, 2)) >= ? AND
						  (POWER(x, 2) + POWER(y, 2)) <= ? AND
						  type = ? AND
						  occupied = 0
				  LIMIT 1';
		
		$this->setID($this->database->query(
				$sql, 
				$this->getCoordinates()->getCoordinate('x'),
				$this->getCoordinates()->getCoordinate('y'),
				$minRadius ** 2, 
				$maxRadius ** 2, 
				$this->getType())[0]);
		
		$sql = 'INSERT INTO village (world_id, owner, name, capital, population, culture_points_production, creation_date, evasion)
				  VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		
		$this->database->query(
				$sql, 
				$this->getID(),
				$this->getOwner()->getID(),
				$this->name,
				$this->capital,
				$this->population,
				$this->culturePointsProduction,
				$this->creationDate,
				$this->isEvasionEnabled());
	}
	
	/**
	 * Adds the loyalty datas into the database
	 */
	public function addLoyalty()
	{
		$sql = 'INSERT INTO world_loyalty (world_id, loyalty)
				  VALUES (?, ?)';
		
		$this->database->query($sql, $this->getID(), $this->getLoyalty()->get());
	}
	
	/**
	 * Adds the resources data into the database
	 */
	public function addResources()
	{
		$sql = 'INSERT INTO world_resource (world_id, wood, clay, iron, crop)
				  VALUES (?, ?, ?, ?, ?)';
		
		$this->database->query(
				$sql,
				$this->getID(),
				$this->getResources()->getResource('wood'),
				$this->getResources()->getResource('clay'),
				$this->getResources()->getResource('iron'),
				$this->getResources()->getResource('crop'));
	}
	
	/**
	 * Adds the storages data into the database
	 */
	public function addStorages()
	{
		$sql = 'INSERT INTO world_storage (world_id, granary, warehose)
				  VALUES (?, ?, ?)';
		
		$this->database->query(
				$sql,
				$this->getID(),
				$this->getStorages()->getStorage('granary'),
				$this->getStorages()->getStorage('warehouse'));
	}
	
	/**
	 * Update the occupation state in the database
	 * 
	 * @param bool $occupied True if occupied, false otherwise
	 */
	public function updateOccupationState(bool $occupied)
	{
		$this->setOccupationState($occupied);
		
		$sql = '';
		
		$this->database->query($sql, $this->isOccupied() ? 1 : 0);
	}

	/**
	 * Check if the Village exists
	 *
	 * @return bool Returns true if the Village exist, false otherwise
	 */
	public function exists(): bool
	{
		return $this->exist;
	}

	/**
	 * Set the Village existence state
	 */
	public function setExistence(): void
	{
		$sql = 'SELECT 1
				  FROM village
				  WHERE world_id = ?';

		$this->exist = $this->database->query($sql, $this->getID())[0] ?? false;
	}
	
	/**
	 * Get the Village owner
	 *
	 * @return User Returns the owner of the village
	 */
	public function getOwner(): User
	{
		return $this->owner;
	}
	
	/**
	 * Set the Village owner
	 * 
	 * @param User $owner The owner of the village
	 */
	public function setOwner(User $owner): void
	{
		$this->owner = $owner;
	}

	/**
	 * Check if the evasion is enabled
	 *
	 * @return bool Returns true if it's enabled, false otherwise
	 */
	private function isEvasionEnabled(): bool
	{
		return $this->evasion;
	}
	
	/**
	 * Set the Village evasion
	 * 
	 * @param bool $evasion True if it's enabled, false otherwise
	 */
	public function setEvasion(bool $evasion): void
	{
		$this->evasion = $evasion;
	}
	
	/**
	 * Check if the village is a capital
	 * 
	 * @return bool Returns true if the Village is a capital, false otherwise
	 */
	public function isCapital(): bool
	{
		return $this->capital;
	}
	
	/**
	 * Set the Village capital state
	 *
	 * @param bool $capital True if it's a capital, false otherwise
	 */
	public function setCapital(bool $capital): void
	{
		$this->capital = $capital;
	}
}
