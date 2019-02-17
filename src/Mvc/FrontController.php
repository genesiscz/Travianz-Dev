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

namespace Travianz\Mvc;

use Travianz\Entity\Request;
use Travianz\Entity\Timer;

/**
 * Elaborates every user's request, by following an MVC pattern
 *
 * @author iopietro
 */
class FrontController
{
	/**
	 * @var string The default executed action
	 */
	const DEFAULT_ACTION = 'default';

	/**
	 * @var Timer Calculates the script execution time
	 */
	private $timer;

	/**
	 * @var Request The received request
	 */
	private $request;

	/**
	 * @var Controller The actual used controller
	 */
	private $controller;

	/**
	 * @var Model The actual used model
	 */
	private $model;

	/**
	 * @var View The actual used view
	 */
	private $view;

	public function __construct()
	{
		mb_internal_encoding('UTF-8');

		$this->timer = new Timer();
		$this->request = $this->parseURL($_SERVER['REQUEST_URI']);
		$this->initMVC($this->request->getControllerName());
	}
	/**
	 * Obtain the chosen controller and the POST/GET parameters from the passed URL
	 *
	 * @param string $request The URL to be parsed
	 * @return Request Returns the controller and parameters
	 */
	private function parseURL(string $url) : Request
	{
		$request = new Request();

		if($url == '') return $request;

		$url = explode('/', $url);
		
		$request->setControllerName($url[1]);

		if (isset($url[2])) $request->setParameters(array_slice($url, 2), false);

		if (!empty($_POST))
		{
			$request->setParameters($_POST);

			if($request->getParameter('action') != '')
			{
				$request->setAction($request->getParameter('action'));
				$request->removeParameter('action');
			}
		}

		return $request;
	}
	/**
	 * Initialize the model, view and controller according to the passed controller name
	 *
	 * @param string $controllerName The controller name
	 */
	private function initMVC(string $controllerName) : void
	{
		$model = MODELS_NAMESPACE.ucfirst($controllerName)."Model";
		$view = VIEWS_NAMESPACE.ucfirst($controllerName)."View";
		$controller = CONTROLLERS_NAMESPACE.ucfirst($controllerName)."Controller";

		$this->model = new $model();
		$this->view = new $view($this->model, $controllerName);
		$this->controller = new $controller($this->model);

		$this->model->attach($this->view);
	}

	/**
	 * Execute the requested method
	 */
	public function executeAction() : void
	{
		if(method_exists($this->controller, $this->request->getAction()))
		{
			call_user_func_array([$this->controller, $this->request->getAction()], [$this->request]);
			
			$this->model->notify();
			$this->view->render($this->timer->getExecutionTime());
		}
		else throw new \ErrorException();
	}
}
