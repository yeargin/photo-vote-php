<?php

require_once DOC_ROOT . '/vendor/twitter-async/EpiCurl.php';
require_once DOC_ROOT . '/vendor/twitter-async/EpiOAuth.php';
require_once DOC_ROOT . '/vendor/twitter-async/EpiTwitter.php';

class Twitter extends EpiTwitter {

	public $redirectUrl;
	private $authenticated;

	function __construct($clientId, $clientSecret) {
    parent::__construct($clientId, $clientSecret);
    $this->redirectUrl = BASE_URL;
    $this->authenticated = false;
  }

	public function setAuthenticated($value = false) {
		$this->authenticated = $value;
		return;
	}
	
	public function isAuthenticated() {
		return $this->authenticated;
	}

}

class TwitterToken {

	private function __construct() {}

	/**
	 * Get Twitter Token from session
	 */
	static function getTwitterToken() {
		if (isset($_SESSION['twitter']['token']))
			return $_SESSION['twitter']['token'];
		else
			return false;
	}

	/**
	 * Set Twitter Token to session
	 */
	static function setTwitterToken($token) {
		$_SESSION['twitter'] = array();
		$_SESSION['twitter']['token'] = $token;
	}

	/**
	 * Delete Twitter Token from session
	 */
	static function deleteTwitterToken() {
		unset($_SESSION['twitter']);
		return true;
	}
}