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

class NewsBox
{	
    /**
     * @var array
     */
    private $data;
   
    public function __construct()
    {
        $this->data = [];
    }

    /**
     * Get a single value from the data array
     *
     * @param int|string $key
     * @return mixed
     */
    public function getData($key)
    {
        return $this->data[$key] ?? null;
    }
    
    /**
     * Set a single value in the data array
     * 
     * @param int|string $key
     * @param mixed $value
     */
    public function addData($key, $value)
    {
        $this->data[$key] = $value;
    }
}
