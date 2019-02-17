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

abstract class WorldCell
{

	/**
	 * @var int The cell ID
	 */
	private $id;

	/**
	 * @var Coordinate The cell world coordinates
	 */
	private $coordinates;

	/**
	 * @var int The cell type
	 */
	private $type;

	/**
	 * @var bool The cell occupation state
	 */
	private $occupied;
	
	/**
	 * @var Loyalty The cell loyalty
	 */
	private $loyalty;
	
	/**
	 * @var array The cell units
	 */
	private $units;
	
	/**
	 * @var Resource The cell resources
	 */
	private $resources;
	
	/**
	 * @var Storage The cell storages
	 */
	private $storages;

	public function __construct(?int $id)
	{
		$this->setID($id);
	}

	/**
	 * Get the cell ID
	 *
	 * @return ?int Returns the cell ID
	 */
	public function getID(): ?int
	{
		return $this->id;
	}

	/**
	 * Set the cell ID
	 *
	 * @param int $id The cell ID to be set
	 */
	public function setID(int $id): void
	{
		$this->id = $id;
	}

	/**
	 * Get the cell coordinates
	 *
	 * @return Coordinate Returns the cell coordinates
	 */
	public function getCoordinates(): Coordinate
	{
		return $this->coordinates;
	}

	/**
	 * Set the cell coordinates
	 *
	 * @param int $coordinates The cell coordinates to be set
	 */
	public function setCoordinates(Coordinate $coordinates): void
	{
		$this->coordinates = $coordinates;
	}
	
	/**
	 * Get the cell type
	 *
	 * @return Coordinate Returns the cell type
	 */
	public function getType(): int
	{
		return $this->type;
	}
	
	/**
	 * Set the cell type
	 *
	 * @param int $type The cell type to be set
	 */
	public function setType(int $type): void
	{
		$this->type = $type;
	}
	
	/**
	 * Check if the cell is occupied
	 *
	 * @return Coordinate Returns true if occupied, false otherwise
	 */
	public function isOccupied(): bool
	{
		return $this->occupied;
	}

	/**
	 * Set the cell occupation state
	 *
	 * @param int $occupied The cell occupation state
	 */
	public function setOccupationState(bool $occupied): void
	{
		$this->occupied = $occupied;
	}
	
	/**
	 * Get the cell loyalty
	 *
	 * @return Loyalty Returns the cell loyalty
	 */
	public function getLoyalty(): Loyalty
	{
		return $this->loyalty;
	}
	
	/**
	 * Set the cell loyalty
	 *
	 * @param Loyalty $loyalty The cell loyalty to be set
	 */
	protected function setLoyalty(Loyalty $loyalty): void
	{
		$this->loyalty = $loyalty;
	}
	
	/**
	 * Get the cell units
	 *
	 * @return array Returns the cell units
	 */
	public function getUnits(): array
	{
		return $this->units;
	}
	
	/**
	 * Set the cell units
	 *
	 * @param array $units The cell units to be set
	 */
	public function setUnits(array $units): void
	{
		$this->units = $units;
	}
	
	/**
	 * Get the cell resources
	 *
	 * @return Resource Returns the cell resources
	 */
	public function getResources(): Resource
	{
		return $this->resources;
	}
	
	/**
	 * Set the cell resources
	 *
	 * @param Resource $resources The cell resources to be set
	 */
	protected function setResources(Resource $resources): void
	{
		$this->resources = $resources;
	}
	
	/**
	 * Get the cell storages
	 *
	 * @return array Returns the cell storages
	 */
	public function getStorages(): Storage
	{
		return $this->storages;
	}
	
	/**
	 * Set the cell storages
	 *
	 * @param Storage $storages The cell storages to be set
	 */
	protected function setStorages(Storage $storages): void
	{
		$this->storages = $storages;
	}
}
