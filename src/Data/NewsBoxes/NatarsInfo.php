<?php

/*
 * This file is part of the Travianz Project
 *
 * Source code: <https://github.com/iopietro/Travianz/>
 *
 * Authors: iopietro <https://github.com/iopietro>
 *
 * License: GNU GPL-3.0 <https://github.com/iopietro/Travianz/blob/master/LICENSE>
 *
 * Copyright 2019 Travianz Team
 */
namespace Travianz\Data\NewsBoxes;

use Travianz\Entity\NewsBox;
use Travianz\Utils\DateTime;

class NatarsInfo extends NewsBox
{

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Get date and time of artefacts release
	 * 
	 * @return string Returns the artefacts release date and time
	 */
	public function getArtefactsReleaseCountDown(): ?string
	{
		return $this->getData('artefactsReleaseCountDown');
	}

	/**
	 * Set date and time of artefacts release
	 * 
	 * @param string $releaseDate The artefacts release date
	 */
	public function setArtefactsReleaseCountDown(string $releaseDate): void
	{
		$secondsLeft = DateTime::get($releaseDate)->getTimestamp() - DateTime::getTimestamp();
		
		if ($secondsLeft < 0 || $secondsLeft > 432000) return;
		
		$this->addData('artefactsReleaseCountDown', DateTime::secondsToTime($secondsLeft));
	}

	/**
	 * Get date and time of building plans release
	 * 
	 * @return string Returns the building plans release date and time
	 */
	public function getBuildingPlansReleaseCountDown(): ?string
	{
		return $this->getData('buildingPlansReleaseCountDown');
	}
	
	/**
	 * Set date and time of building plans release
	 * 
	 * @param string $releaseDate The building plans release date
	 */
	public function setBuildingPlansReleaseCountDown(string $releaseDate): void
	{
		$secondsLeft = DateTime::get($releaseDate)->getTimestamp() - DateTime::getTimestamp();
		
		if ($secondsLeft < 0 || $secondsLeft > 432000) return; 
		
		$this->addData('buildingPlansReleaseCountDown', DateTime::secondsToTime($secondsLeft));
	}

	/**
	 * Get date and time of World Wonders release
	 * 
	 * @return string Returns the Worlds Wonder release date and time
	 */
	public function getWorldWondersReleaseCountDown(): ?string
	{
		return $this->getData('worldWondersReleaseCountDown');
	}
	
	/**
	 * Set date and time of World Wonders release
	 * 
	 * @param string $releaseDate The World Wonders release date
	 */
	public function setWorldWondersReleaseCountDown(string $releaseDate): void
	{
		$secondsLeft = DateTime::get($releaseDate)->getTimestamp() - DateTime::getTimestamp();

		if ($secondsLeft < 0 || $secondsLeft > 432000) return; 
		
		$this->addData('worldWondersReleaseCountDown', DateTime::secondsToTime($secondsLeft));
	}
	
	/**
	 * Check if artefacts have been released
	 * 
	 * @return bool Returns true if they've been released, false otherwise
	 */
	public function areArtefactsReleased(): bool
	{
		return $this->getData('artefactsReleased');
	}
	
	/**
	 * Set if artefacts have been released or not
	 * 
	 * @param string $releaseDate The artefacts release date
	 */
	public function setArtefactsReleased(string $releaseDate): void
	{
		$this->addData('artefactsReleased', DateTime::get($releaseDate)->getTimestamp() < DateTime::getTimestamp());
	}
	
	/**
	 * Check if building plans have been released
	 *
	 * @return bool Returns true if they've been released, false otherwise
	 */
	public function areBuildingPlansReleased(): bool
	{
		return $this->getData('buildingPlansReleased');
	}
	
	/**
	 * Set if building plans have been released
	 * 
	 * @param string $releaseDate The building plans release date
	 */
	public function setBuildingPlansReleased(string $releaseDate): void
	{
		$this->addData('buildingPlansReleased', DateTime::get($releaseDate)->getTimestamp() < DateTime::getTimestamp());
	}
	
	/**
	 * Check if World Wonders have been released
	 * 
	 * @return bool Returns true if they've been released, false otherwise
	 */
	public function areWorldWondersReleased(): bool
	{
		return $this->getData('worldWondersReleased');
	}
	
	/**
	 * Set if the World Wonders have been released
	 * 
	 * @param string $releaseDate The World Wonders release date
	 */
	public function setWorldWondersReleased(string $releaseDate): void
	{
		$this->addData('worldWondersReleased', DateTime::get($releaseDate)->getTimestamp() < DateTime::getTimestamp());
	}
}
