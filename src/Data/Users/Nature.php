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
class Nature extends User
{    
    public function __construct(IDbConnection $db) {
        parent::__construct($db, [2, TRIBE4, TribeEnums::NATURE], false, false);
        $this->access = 2;
    }
}