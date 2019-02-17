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

final class Resource
{

	/**
	 * @var array The resources
	 */
	private $resources;
	
	/**
	 * @var ?string The resources last update date
	 */
	private $lastUpdateDate;
	
	public function __construct(array $resources, ?string $lastUpdateDate = null)
	{
		$this->resources = $resources;
		$this->lastUpdateDate = $lastUpdateDate;
	}
	
	/**
	 * Get a resource value by its name
	 * 
	 * @param string $name The resource name
	 * @return float|NULL Returns the resource value or null
	 */
	public function getResource(string $name): ?float
	{
		return $this->resources[$name] ?? null;
	}
	
	/**
	 * Get the resources array
	 * 
	 * @return array Returns the resources array or an empty array if null
	 */
	public function get(): array
	{
		return $this->resources ?? [];
	}
	
	/**
	 * Set a resource
	 * 
	 * @param string $name The resource name
	 * @param float $value The resource value
	 */
	public function setResource(string $name, float $value): void
	{
		$this->resources[$name] = $value;
	}
	
	/**
	 * Set the resources array
	 * 
	 * @param array $resources The resources array to be set
	 */
	public function set(array $resources): void
	{
		$this->resources = $resources;
	}
	
	/**
	 * Get the resources last update date
	 *
	 * @return string|NULL Returns the resources last update date or null
	 */
	public function getLastUpdateDate(): ?string
	{
		return $this->lastUpdateDate;
	}
}
