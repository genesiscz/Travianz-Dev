<?php

/*
 * This file is part of the Travianz Project
 *
 * Source code: <https://github.com/iopietro/Travianz/>
 *
 * Authors: iopietro <https://github.com/iopietro>
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
abstract class NewsBox
{
    /**
     * @var IDbConnection
     */
    protected $db;

    /**
     * @var array
     */
    private $data;
   
    protected function __construct(IDbConnection $db)
    {
        $this->db = $db;
        $this->data = [];
    }
    
    /**
     * Init the newsbox
     */
    abstract public function init();

    /**
     * Get a single value from the data array
     *
     * @param int|string [Optional] $key
     * @return mixed
     */
    public function getData($key = null)
    {
        return is_null($key) ? $this->data : $this->data[$key];
    }
    
    /**
     * Set a single value in the data array
     * 
     * @param int|string $key
     * @param int|string $value
     * @return mixed
     */
    protected function addData($key, $value)
    {
        $this->data[$key] = $value;
    }
}