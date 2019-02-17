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

final class Storage
{
	
	/**
	 * @var array The storages
	 */
	private $storages;
	
	public function __construct(array $storages)
	{
		$this->storages = $storages;
	}
	
	/**
	 * Get a storages value by its name
	 *
	 * @param string $name The storage name
	 * @return int|NULL Returns the storage value or null
	 */
	public function getStorage(string $name): ?int
	{
		return $this->storages[$name] ?? null;
	}
	
	/**
	 * Get the storages array
	 *
	 * @return array Returns the storages array or an empty array if null
	 */
	public function get(): array
	{
		return $this->storages ?? [];
	}
	
	/**
	 * Set a storage
	 *
	 * @param string $name The storage name
	 * @param int $value The storage value
	 */
	public function setStorage(string $name, int $value): void
	{
		$this->storages[$name] = $value;
	}
	
	/**
	 * Set the storages array
	 *
	 * @param array $storages The storages array to be set
	 */
	public function set(array $storages): void
	{
		$this->storages = $storages;
	}
}
