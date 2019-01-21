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

namespace Travianz\Factory;

use Travianz\Data\Movements\Normal;
use Travianz\Data\Movements\Raid;
use Travianz\Data\Movements\Reinforcement;
use Travianz\Data\Movements\Returning;
use Travianz\Data\Movements\ReturningTrade;
use Travianz\Data\Movements\Settling;
use Travianz\Data\Movements\Spy;
use Travianz\Data\Movements\Trade;
use Travianz\Database\IDbConnection;
use Travianz\Enums\MovementEnums;
use Travianz\Entity\WorldCell;
/**
 * @author iopietro
 */
abstract class MovementsFactory
{
    public static function create(
        int $type,
        IDbConnection $db,
        int $id,
        WorldCell $from,
        WorldCell $to,
        int $startTime,
        int $endTime,
        array $resources,
        array $units = [],
        int $merchants = 0,
        int $repetitions = 0,
        int $ref = 0,
        array $catapultTargets = [0, 0],
        int $spy = 0
    ) {
        switch($type) {
            case MovementEnums::SPY:
                return new Spy($db, $id, $ref, $from, $to, $startTime, $endTime, $resources, $units, $catapultTargets, $spy);
            case MovementEnums::REINFORCEMENT:
                return new Reinforcement($db, $id, $ref, $from, $to, $startTime, $endTime, $resources, $units, $catapultTargets, $spy);
            case MovementEnums::NORMAL:
                return new Normal($db, $id, $ref, $from, $to, $startTime, $endTime, $resources, $units, $catapultTargets, $spy);
            case MovementEnums::RAID:
                return new Raid($db, $id, $ref, $from, $to, $startTime, $endTime, $resources, $units, $catapultTargets, $spy);
            case MovementEnums::SETTLING:
                return new Settling($db, $id, $ref, $from, $to, $startTime, $endTime, $resources, $units, $catapultTargets, $spy);
            case MovementEnums::TRADE:
                return new Trade($db, $id, $from, $to, $startTime, $endTime, $resources, $merchants, $repetitions);
            case MovementEnums::RETURNING:
                return new Returning($db, $id, $ref, $from, $to, $startTime, $endTime, $resources, $units, $catapultTargets, $spy);
            case MovementEnums::RETURNING_TRADE:
                return new ReturningTrade($db, $id, $from, $to, $startTime, $endTime, $resources, $merchants, $repetitions);
        }
    }
}