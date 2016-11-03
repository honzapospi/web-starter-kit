<?php

/**
 * Copyright (c) Jan Pospisil (http://www.jan-pospisil.cz)
 */

namespace Application;
use Nette\Localization\ITranslator;
use Nette\Localization\message;
use Nette\Localization\plural;

/**
 * Translator
 * @author Jan Pospisil
 */

class Translator extends \Nette\Object implements ITranslator {

	function translate($message, $count = NULL) {
		return $message;
	}

}
