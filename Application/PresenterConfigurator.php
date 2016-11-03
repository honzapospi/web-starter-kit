<?php

/**
 * Copyright (c) Jan Pospisil (http://www.jan-pospisil.cz)
 */

namespace Application;
use JP\Composition\UI\IControlConfigurator;
use JP\Composition\UI\ILayoutControl;
use JP\Composition\UI\IPresenterConfigurator;
use JP\Composition\UI\Presenter;

/**
 * PresenterConfiguration
 * @author Jan Pospisil
 */

class PresenterConfigurator extends \Nette\Object implements IPresenterConfigurator {

	private $controlConfigurator;
	private $layoutControl;

	public function __construct(IControlConfigurator $controlConfigurator, ILayoutControl $layoutControl){
		$this->controlConfigurator = $controlConfigurator;
		$this->layoutControl = $layoutControl;
	}

	public function configure(Presenter $presenter) {
		$this->controlConfigurator->configure($presenter);
		$presenter->setLayoutControl($this->layoutControl);
	}

}
