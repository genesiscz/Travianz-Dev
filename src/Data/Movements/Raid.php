<?php

/*
 * This file is part of the Travianz Project
 *
 * Source code: <https://github.com/Shadowss/Travianz/>
 *
 * Author: iopietro <https://github.com/iopietro>
 *
 * License: GNU GPL-3.0 <https://github.com/Shadowss/Travianz/blob/master/LICENSE>
 *
 * Copyright 2010-2018 Travianz Team
 */

namespace Travianz\Data\Movements;

use Travianz\Entity\Attack;
use Travianz\Entity\Village;
use Travianz\Entity\WorldCell;
use Travianz\Enums\MovementEnums;
use Travianz\Database\IDbConnection;

/**
 * @author iopietro
 */
final class Raid extends Attack
{
    public function __construct(
        IDbConnection $db,
        int $id,
        int $ref,
        Village $from,
        WorldCell $to,
        int $startTime,
        int $endTime,
        array $resources,
        array $units,
        array $catapultTargets,
        int $spy
    ) {
        parent::__construct(
            $db,
            $id,
            $ref,
            $from,
            $to,
            $startTime,
            $endTime,
            MovementEnums::RAID,
            $resources,
            $units,
            $catapultTargets,
            $spy
        );
    }
    
    /**
     * {@inheritDoc}
     * @see \Travianz\Entity\Attack::addAttack()
     */
    public function add()
    {
        parent::addAttack();
    }
}