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

use Travianz\Models\InstallationModel;
use Travianz\Mvc\View;

/**
 * @author iopietro
 */
class InstallationView extends View
{	
	/**
	 * @var string The base template to render
	 */
	private const BASE_TEMPLATE = 'installation.tpl';
	
	/**
	 * @var \Smarty
	 */
	private $smarty;
	
	public function __construct(InstallationModel $model, string $viewName)
	{
		parent::__construct($model, $viewName);
		$this->smarty = new \Smarty();
	}

	/**
	 * Render the view
	 * 
	 * @param float $executionTime The time required to execute the script
	 */
	public function render(float $executionTime)
	{
		$this->smarty->assign($this->data);

		$this->smarty->assign('templateToRender', TEMPLATES_DIR . strtolower($this->name) . '\\' . ($this->model->request->getParameters(false)[0] ?? '') . '.tpl');
		
		$this->smarty->display(TEMPLATES_DIR . strtolower($this->name) . '\\' . self::BASE_TEMPLATE);
	}
}
