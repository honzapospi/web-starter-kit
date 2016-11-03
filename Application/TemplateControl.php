<?php

/**
 * Copyright (c) Jan Pospisil (http://www.jan-pospisil.cz)
 */

namespace Application;
use JP\Composition\UI\ITemplateControl;
use JP\Composition\UI\Presenter;
use Nette\Application\Helpers;

/**
 * TemplateControl
 * @author Jan Pospisil
 */

class TemplateControl extends \Nette\Object implements ITemplateControl {

	private $dir;
	private $layout = 'layout';
	public $onFormatTemplateFile;

	public function __construct($dir){
		if(!is_dir($dir))
			throw new \InvalidArgumentException('Directory "'.$dir.'" does not exist.');
		$this->dir = $dir;
	}

	public function formatTemplateFile(\Nette\Application\UI\Control $control) {
		$parts = explode('\\', get_class($control));
		array_shift($parts);
		$template[] = $this->dir;
		foreach($parts as $part){
			if(substr($part, -6) == 'Module'){
				$template[] = $part;
			} elseif(substr($part, -9) == 'Presenter'){
				$template[] = $part;
				break;
			}
		}
		$templateFilename = implode(DIRECTORY_SEPARATOR, $template);
		if($control instanceof Presenter){
			$templateFilename .= '.'.$control->view;
		}
		$templateFilename .= '.latte';
		$this->onFormatTemplateFile($templateFilename, $control);
		return $templateFilename;
	}

	public function formatLayoutTemplateFile(Presenter $control) {
		$parts = explode('\\', get_class($control));
		array_shift($parts);
		$template[] = $this->dir;
		$templateFilename = implode(DIRECTORY_SEPARATOR, $template);
		return $templateFilename.DIRECTORY_SEPARATOR.'@'.$this->layout.'.latte';
	}

	public function setLayout($layout) {
		$this->layout = $layout;
	}
}
