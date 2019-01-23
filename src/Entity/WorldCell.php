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

namespace Travianz\Entity;

use Travianz\Database\IDbConnection;

/**
 * @author iopietro
 */
class WorldCell
{
    /**
     * @var int The cell ID
     */
    public $wref;
    
    //TODO: Merge these to a single field and database column
    /**
     * @var int The cell field type (if it's a village)
     */
    public $fieldType;
    
    /**
     * @var int The cell field type (if it's an oasis)
     */
    public $oasesType;
    
    /**
     * @var array The cell world coordinates
     */
    public $coordinates;
    
    /**
     * @var bool Determines if the cell is already occupied
     */
    public $occupied;
    
    /**
     * @var string The cell image type
     */
    public $image;
    
    /**
     * @var IDbConnection
     */
    protected $db;
    
    public function __construct(
        IDbConnection $db,
        int $wref,
        int $fieldType,
        int $oasesType,
        array $coordinates,
        bool $occupied,
        string $image
    ) {
        $this->db = $db;
        $this->wref = $wref;
        $this->fieldType = $fieldType;
        $this->oasesType = $oasesType;
        $this->coordinates = $coordinates;
        $this->occupied = $occupied;
        $this->image = $image;
    }
}