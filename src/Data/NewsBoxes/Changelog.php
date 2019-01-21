<?php 

/*
 * This file is part of the Travianz Project
 *
 * Source code: <https://github.com/Shadowss/Travianz/>
 *
 * Authors: iopietro <https://github.com/iopietro>
 *
 * License: GNU GPL-3.0 <https://github.com/Shadowss/Travianz/blob/master/LICENSE>
 *
 * Copyright 2010-2018 Travianz Team
 */

namespace Travianz\Data\NewsBoxes;

use Travianz\Entity\NewsBox;
use Travianz\Database\IDbConnection;

/**
 * @author iopietro
 */
class Changelog extends NewsBox
{
    public function __construct(IDbConnection $db)
    {
        parent::__construct($db);
    }

    public function init()
    {}
}