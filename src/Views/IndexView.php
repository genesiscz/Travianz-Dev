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
use Travianz\Models\IndexModel;

/**
 * @author iopietro
 */
class IndexView extends View
{	
	/**
	 * @var string The base template to render
	 */
	private const BASE_TEMPLATE = 'index.tpl';
	
	/**
	 * @var \Smarty
	 */
	private $smarty;
	
	public function __construct(IndexModel $model, string $viewName)
	{
		parent::__construct($model, $viewName);
		$this->smarty = new \Smarty();
	}

	/**
	 * Render the view
	 */
	public function render(float $executionTime)
	{
		$this->smarty->assign($this->data);

		$this->smarty->display(TEMPLATES_DIR . strtolower($this->name) . '\\' . self::BASE_TEMPLATE);
	}
}
