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

namespace Travianz\Controllers;

use Travianz\Mvc\Controller;
use Travianz\Models\VillageModel;
use Travianz\Exceptions\InvalidParametersException;

/**
 * @author iopietro
 */
class VillageController extends Controller
{
    public function __construct(VillageModel $model)
    {
        parent::__construct($model);
    }

    /**
     * Called when the page is loaded with no action that needs to be executed
     *
     * @param $methodName string The method to be called
     * @param $parameters array The parameters
     */
    public function default(string $methodName, array $parameters)
    {
        try {
            // Check if the method has some parameters
            $this->model->set([__METHOD__ => $this->model->$methodName($parameters)]);
        } catch (InvalidParametersException $exception) {
            // Some parameters were invalid
            $this->model->set([__METHOD__ => $exception->getParameters()]);
        }
    }
}
