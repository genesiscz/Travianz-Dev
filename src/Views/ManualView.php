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

use Travianz\Mvc\View;
use Travianz\Models\ManualModel;

/**
 * @author iopietro
 */
class ManualView extends View
{	
	/**
	 * @var \Smarty
	 */
	private $smarty;
	
	public function __construct(ManualModel $model, string $viewName)
	{
		parent::__construct($model, $viewName);

		$this->smarty = new \Smarty();
	}

	/**
	 * Render the view
	 */
	public function render(float $executionTime)
	{
		$this->smarty->assign('templateToRender', TEMPLATES_DIR . strtolower($this->name) . '\\' . ($this->model->request->getParameters(false)[0] ?? '') . '.tpl');

		$this->smarty->display(TEMPLATES_DIR . strtolower($this->name) . '\\manual.tpl');
	}
}
