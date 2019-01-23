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

namespace Travianz\Enums;

/**
 * @author iopietro
 */
abstract class BuildingJobEnums
{
    const NORMAL = 0;
    
    const IN_LOOP = 1;
    
    const MASTER_BUILDER = 2;
    
    const IN_DEMOLITION = 3;
    
    const IN_DEMOLITION_LOOP = 4;
}