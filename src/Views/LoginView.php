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

namespace Travianz\Views;

use Travianz\Models\LoginModel;
use Travianz\Mvc\View;

/**
 * @author iopietro
 */
class LoginView extends View
{	
	/**
	 * @var string The base template to render
	 */
	private const BASE_TEMPLATE = 'baseNotLoggedIn.tpl';
	
	/**
	 * @var \Smarty
	 */
	private $smarty;
	
	public function __construct(LoginModel $model, string $viewName)
	{
		parent::__construct($model, $viewName);
		$this->smarty = new \Smarty();
	}

	/**
	 * Render the view
	 */
	public function render(float $executionTime)
	{
		$this->setObjects($this->data);

		$this->smarty->assign('templateToRender', TEMPLATES_DIR . strtolower($this->name) . '\\' . strtolower($this->name) . '.tpl');
		
		$this->smarty->display(TEMPLATES_DIR . self::BASE_TEMPLATE);
	}

	/**
	 * Set the templates objects
	 *
	 * @param array $objects The objects to be set
	 */
	public function setObjects(array $objects)
	{
		if (!empty($objects))
		{
			foreach ($objects as $object) 
			{
				$this->smarty->assignByRef(lcfirst((new \ReflectionClass($object))->getShortName()), $object);
			}
		}
	}
}
