<?php

/**
 * Copyright (c) Jan Pospisil (http://www.jan-pospisil.cz)
 */

namespace Application;
use JP\Composition\UI\ILayoutControl;
use JP\Composition\UI\Presenter;
use Nette\Application\UI\ITemplate;
use Nette\ComponentModel\IComponent;
use Tracy\Debugger;

/**
 * LayoutControl
 * @author Jan Pospisil
 */

class LayoutControl extends \JP\Composition\UI\LayoutControl implements ILayoutControl {

	public function setupLayout(ITemplate $template, Presenter $presenter) {
		$template->min = Debugger::$productionMode ? '.min' : '';
	}



}
