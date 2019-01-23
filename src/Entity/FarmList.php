<?php

/*
 * This file is part of the Travianz Project
 *
 * Source code: <https://github.com/iopietro/Travianz/>
 *
 * Authors: martinambrus <https://github.com/martinambrus>
 *          iopietro <https://github.com/iopietro>
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
class FarmList
{
    /**
     * @var int The farm list ID
     */
    public $id;
    
    /**
     * @var Village The attacker village
     */
    public $from;
    
    /**
     * @var array The farm list name
     */
    public $name;
    
    /**
     * @var array The raids list which belong to this farm list
     */
    public $raidsList;
    
    /**
     * @var IDbConnection
     */
    private $db;
    
    public function __construct(IDbConnection $db, int $id, Village $from, string $name, array $raidsList)
    {
        $this->db = $db;
        $this->id = $id;
        $this->from = $from;
        $this->name = $name;
        $this->raidsList = $raidsList;
    }
    
    /**
     * Add the farm list
     */
    public function add()
    {
        $sql = 'INSERT INTO
                        ' . TB_PREFIX .'farmlist
                        (`from`, owner, name)
                VALUES
                        (?, ?, ?)';
        
        $this->id = $this->db->queryNew(
            $sql,
            $this->from->vref,
            $this->from->owner->id,
            $this->name
        );
    }
    
    /**
     * Delete the farm list and all of its raid lists
     */
    public function delete()
    {
        $sql = 'DELETE farmlist, raidlist FROM
                    ' . TB_PREFIX .'farmlist farmlist
                LEFT JOIN
                    ' . TB_PREFIX .'raidlist raidlist
                ON
                    raidlist.lid = farmlist.id
                WHERE
                    farmlist.id = ?';

        $this->db->queryNew($sql, $this->id);
    }
}