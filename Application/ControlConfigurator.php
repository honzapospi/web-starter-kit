<?php

/**
 * Copyright (c) Jan Pospisil (http://www.jan-pospisil.cz)
 */

namespace Application;
use JP\Composition\UI\IControlConfigurator;
use JP\Composition\UI\ITemplateControl;
use JP\TemplateMaker\Bar;
use JP\TemplateMaker\FileCreator;
use Nette\Application\UI\Control;

/**
 * ControlConfigurator
 * @author Jan Pospisil
 */

class ControlConfigurator extends \Nette\Object implements IControlConfigurator {

	private $templateControl;
	private $translator;

	public function __construct(ITemplateControl $templateControl, Translator $translator, Bar $bar){
		$this->templateControl = $templateControl;
		$this->translator = $translator;
		$this->templateControl->onFormatTemplateFile[] = function($templateFilename, $control) use ($bar) {
			$bar->addControl($control, $templateFilename);
		};
	}

	public function configure(Control $control) {
		$control->setTemplateControl($this->templateControl);
		$control->setTranslator($this->translator);
	}

}
