<?php

require DOC_ROOT . '/vendor/smarty3/libs/Smarty.class.php';

class TripitShareSmarty extends Smarty {
	
	function __construct() {
    parent::__construct();
		$this->setTemplateDir(DOC_ROOT . '/templates');
		$this->setCompileDir(DOC_ROOT . '/cache');
		$this->setCacheDir(DOC_ROOT . '/cache');
		$this->setConfigDir(DOC_ROOT . '/templates/config');
	}

}