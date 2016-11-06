<?php

/**
 * Copyright (c) Jan Pospisil (http://www.jan-pospisil.cz)
 */

namespace Application;
use JP\Composition\UI\IControlConfigurator;
use JP\Composition\UI\ILayoutControl;
use JP\Composition\UI\IPresenterConfigurator;
use JP\Composition\UI\Presenter;
use JP\TemplateMaker\TemplateMaker;

/**
 * PresenterConfiguration
 * @author Jan Pospisil
 */

class PresenterConfigurator extends \Nette\Object implements IPresenterConfigurator {

	private $controlConfigurator;
	private $layoutControl;
	private $templateMaker;

	public function __construct(IControlConfigurator $controlConfigurator, ILayoutControl $layoutControl, TemplateMaker $templateMaker){
		$this->controlConfigurator = $controlConfigurator;
		$this->layoutControl = $layoutControl;
		$this->templateMaker = $templateMaker;
	}

	public function configure(Presenter $presenter) {
		$presenter->onStartup[] = function() use ($presenter){
			$this->templateMaker->createFiles($presenter);
		};
		$this->controlConfigurator->configure($presenter);
		$presenter->setLayoutControl($this->layoutControl);
	}

}
