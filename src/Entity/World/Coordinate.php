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

final class Coordinate
{
	/**
	 * @var array Stores the coordinates
	 */
	private $coordinates;
	
	public function __construct(array $coordinates)
	{
		$this->setCoordinates($coordinates);
	}
	
	/**
	 * Get the coordinates
	 *
	 * @return int Returns the coordinates value
	 */
	public function getCoordinates(): array
	{
		return $this->coordinates ?? [];
	}
	
	/**
	 * Get a single coordinate
	 * 
	 * @param string $name The name of the coordinate
	 * @return ?int Returns the coordinate value, null if it doesn't exist
	 */
	public function getCoordinate(string $name): ?int
	{
		return $this->coordinates[$name] ?? null;
	}
	
	/**
	 * Set the coordinates
	 *
	 * @param string $coordinates The coordinates to be set
	 */
	public function setCoordinate(array $coordinates): void
	{
		$this->coordinates = $coordinates;
	}
	
	/**
	 * Get the world cell ID from a set of coordinates
	 * 
	 * @param int $worldMax The maximum size of the world
	 * @return ?int Returns the calculated cell ID or null if coordinates aren't valid
	 */
	public function getID(int $worldMax): ?int
	{
		return (($worldMax - $this->getCoordinate('x')) * ($worldMax * 2 + 1)) + ($worldMax + $this->getCoordinate('y') + 1);
	}
	
	/**
	 * Calculates the distance between two coordinates
	 * 
	 * @param Coordinate $fromCoordinate The first coordinates set
	 * @param Coordinate $toCoordinate The second coordinates set
	 * @param int $worldMax The maximum size of the world
	 * @return float Returns the calculated distance, null if coordinates aren't valid
	 */
	public static function getDistance(Coordinate $fromCoordinate, Coordinate $toCoordinate, int $worldMax): ?float
	{
		$xDistance = (abs($fromCoordinate->getCoordinate('x') - $toCoordinate->getCoordinate('x')));
		$yDistance = (abs($fromCoordinate->getCoordinate('y') - $toCoordinate->getCoordinate('y')));
		
		if ($xDistance > $worldMax) $xDistance = (2 * $worldMax + 1) - $xDistance;
		if ($yDistance > $worldMax) $yDistance = (2 * $worldMax + 1) - $yDistance;
		
		return sqrt($xDistance ** 2 + $yDistance ** 2);
	}
}
