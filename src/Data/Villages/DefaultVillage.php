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

namespace Travianz\Data\Villages;

use Travianz\Database\IDbConnection;
use Travianz\Entity\World\Village;
use Travianz\Entity\World\Loyalty;
use Travianz\Config\Config;
use Travianz\Entity\World\Resource;
use Travianz\Entity\World\Storage;

final class DefaultVillage extends Village
{

	public function __construct(IDbConnection $database, int $id = null)
	{
		parent::__construct($database, $id);
		$this->setLoyalty(new Loyalty(100));
		$this->setResources(new Resource(['wood' => 750, 'clay' => 750, 'iron' => 750, 'crop' => 750]));
		$this->setStorages(new Storage(['granary' => Config::STORAGE_CAPACITY, 'warehouse' => Config::STORAGE_CAPACITY]));

		$this->population = 2;
		$this->culturePointsProduction = 2;
		$this->setEvasion(false);
		$this->setOccupationState(true);
	}
}

