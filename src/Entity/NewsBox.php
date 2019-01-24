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

abstract class NewsBox
{	
    /**
     * @var array
     */
    private $data;
   
    protected function __construct()
    {
        $this->data = [];
    }

    /**
     * Get a single value from the data array
     *
     * @param int|string $key
     * @return mixed
     */
    protected function getData($key)
    {
        return $this->data[$key];
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