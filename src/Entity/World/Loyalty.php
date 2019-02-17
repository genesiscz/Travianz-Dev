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

final class Loyalty
{

	/**
	 * @var float The loyalty value
	 */
	private $value;
	
	/**
	 * @var ?string The loyalty last update date
	 */
	private $lastUpdateDate;
	
	public function __construct(float $value, ?string $lastUpdateDate = null)
	{
		$this->value = $value;
		$this->lastUpdateDate = $lastUpdateDate;
	}
	
	/**
	 * Get the loyalty value
	 * 
	 * @return float Returns the loyalty value
	 */
	public function get(): float
	{
		return $this->value;
	}
	
	/**
	 * Set the loyalty value
	 *
	 * @param float $value The loyalty value to be set
	 */
	public function set(float $value): void
	{
		$this->value = $value;
	}
	
	/**
	 * Set the loyalty last update date
	 *
	 * @return string|NULL Returns the loyalty last update date or null
	 */
	public function getLastUpdateDate(): ?string
	{
		return $this->lastUpdateDate;
	}
}

