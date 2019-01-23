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

namespace Travianz\Data\Users;

use Travianz\Database\IDbConnection;
use Travianz\Entity\User;
use Travianz\Enums\TribeEnums;

/**
 * @author iopietro
 */
class Natars extends User
{    
    public function __construct(IDbConnection $db) {
        parent::__construct($db, [3, TRIBE5, TribeEnums::NATARS], false, false);
        $this->access = 2;
    }
}