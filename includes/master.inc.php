<?php

// Site configuration
require 'config.php';

// Base classes
require 'class.error.php';
require 'class.smarty.php';
require 'class.swift.php';
require 'class.twitter.php';
require 'class.database.php';
require 'class.gd.php';

// Sessions
session_start();

// Database
$DB = Database::getDatabase();

// Smarty
$Smarty = new PhotoVoteSmarty;
$Smarty->assign('base_url', BASE_URL);
if (defined('DEBUG')):
	$Smarty->debugging = DEBUG;
endif;
if (defined('ANALYTICS_CODE')):
	$Smarty->assign('analytics_code', ANALYTICS_CODE);
else:
	$Smarty->assign('analytics_code', '');
endif;


// Twitter
$apiKey = TWITTER_API_KEY;
$clientId = TWITTER_CLIENT_ID;
$clientSecret = TWITTER_CLIENT_SECRET;

// Default Twitter object
$Twitter = new Twitter($clientId, $clientSecret);

// Logout of a Twitter account
if (isset($_GET['logout'])):
	TwitterToken::deleteTwitterToken();
	header('Location: ' . BASE_URL);
	exit;
endif;

// Set authorized token from Session
if (is_array(TwitterToken::getTwitterToken())):
	$token = TwitterToken::getTwitterToken();
	$Twitter->setToken($token['oauth_token'], $token['oauth_token_secret']);
	$Twitter->setAuthenticated(true);
	$Smarty->assign('twitterAuthenticated', true);
else:
	$Smarty->assign('twitterAuthenticated', false);
endif;

// Default query
if ($Twitter->isAuthenticated() == true):
	// Get User Information
	try {
		$userInfo = $Twitter->get('/account/verify_credentials.json');
		$Smarty->assign('userInfo', $userInfo->response);
	} catch (Exception $e) {
		print $e->getMessage();
	}
endif;