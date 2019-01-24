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

class Request
{	
	/**
	 * @var string The controller name
	 */
	private $controllerName;
	
	/**
	 * @var string The action to be executed
	 */
	private $action;
	
	/**
	 * @var array The request parameters ['post'] and ['get']
	 */
	private $parameters;
	
	public function __construct()
	{
		$this->controllerName = '';
		$this->action = 'default';
		$this->parameters = ['post' => [], 'get' => []];
	}
	
	/**
	 * Set the request action
	 * 
	 * @param string $action The action to be set
	 */
	public function setAction(string $action) : void
	{
		if ($action == '') return;
		
		$this->action = lcfirst(preg_replace('/\s+/', '', $action));
	}
	
	/**
	 * Get the request action
	 * 
	 * @return string Returns the action
	 */
	public function getAction() : string
	{
		return $this->action;
	}
	
	/**
	 * Set the request parameters
	 * 
	 * @param bool $post Set POST parameters if true, GET parameters if false
	 * @param array $parameters The parameters to be set
	 */
	public function setParameters(array $parameters, bool $post = true) : void
	{
		$post ? $this->parameters['post'] = $parameters : $this->parameters['get'] = $parameters;
	}
	
	/**
	 * Get the request parameters
	 * 
	 * @param bool $post Returns POST parameters if true, GET parameters if false, 
	 * @return array Returns get or post parameters
	 */
	public function getParameters(bool $post = true) : array
	{
		return $post ? $this->parameters['post'] : $this->parameters['get'];
	}
	
	/**
	 * Set the request controller name
	 * 
	 * @param string $controllerName The controller name to be set
	 */
	public function setControllerName(string $controllerName) : void
	{
		$this->controllerName = $controllerName ?? '';
	}

	/**
	 * Get the request controller name
	 * 
	 * @return string Returns the controller name
	 */
	public function getControllerName() : string
	{
		return $this->controllerName;
	}
}