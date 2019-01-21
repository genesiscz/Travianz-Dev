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

use Travianz\Entity\Movement;
use Travianz\Database\IDbConnection;
use Travianz\Entity\Village;
use Travianz\Enums\MovementEnums;

/**
 * @author iopietro
 */
final class ReturningTrade extends Movement
{
    /**
     * @var int The number of merchants of this trade
     */
    public $merchants;
    
    /**
     * @var int The number of trade repetitions
     */
    public $repetitions;
    
    public function __construct(
        IDbConnection $db,
        int $id,
        Village $from,
        Village $to,
        int $startTime,
        int $endTime,
        array $resources,
        int $merchants,
        int $repetitions
    ) {
        parent::__construct($db, $id, 0, $from, $to, $startTime, $endTime, MovementEnums::RETURNING_TRADE, $resources);
            $this->merchants = $merchants;
            $this->repetitions = $repetitions;
    }
    
    /**
     * {@inheritDoc}
     * @see \Travianz\Entity\Movement::addMovement()
     */
    public function add()
    {  
        parent::addMovement($this->merchants, $this->repetitions);
    }
}