<?php

require 'includes/master.inc.php';

$user_token = TwitterToken::getTwitterToken();

if (is_array($user_token)) {
	$token = $user_token;
	$Twitter->setToken($token['oauth_token'], $token['oauth_token_secret']);
	$Twitter->setAuthenticated(true);
	$Smarty->assign('twitterAuthenticated', $Twitter->isAuthenticated());
} else {
	if (isset($_GET['oauth_token'])) {
		$Twitter->setToken($_GET['oauth_token']);
		$token = $Twitter->getAccessToken();
		TwitterToken::setTwittertoken(array('oauth_token' => $token->oauth_token, 'oauth_token_secret' => $token->oauth_token_secret));
		$Twitter->setToken($token->oauth_token, $token->oauth_token_secret);
		$Twitter->setAuthenticated(true);		
	} else {
		$Smarty->assign('authorizeUrl', $Twitter->getAuthorizeUrl() );
		$Twitter->setAuthenticated(false);
	}
	$Smarty->assign('twitterAuthenticated', $Twitter->isAuthenticated());
}

if ($Twitter->isAuthenticated() == true):

	// Get User Information
	$userInfo = $Twitter->get('/account/verify_credentials.json');
	$Smarty->assign('userInfo', $userInfo->response);

	// Add database row if not already set
	$check = $DB->getRows("SELECT * FROM users WHERE UPPER(twitter_screenname) = UPPER('{$userInfo->screen_name}'); ");
	if (count($check) == 0):
		$record = new User();
		$record->twitter_screenname = $userInfo->screen_name;
		$record->is_admin = 0;
		$_SESSION['user_id'] = $user_id = $record->insert();
	else:
		$_SESSION['user_id'] = $check[0]['id'];
		$_SESSION['is_admin']  =$check[0]['is_admin'];
	endif;

endif;

// Redirect if already logged in
if($Twitter->isAuthenticated())
	header('Location: ' . BASE_URL);

// Render
$Smarty->display('authenticate.tpl');