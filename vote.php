<?php

require 'includes/master.inc.php';

if (isset($_POST) && isset($userInfo->screen_name)):
	
	// Set up ballot
	$photo_id = (int) $_POST['photo_id'];
	$user_id = (int) $_SESSION['user_id'];
	$vote = (int) $_POST['vote'];
	
	// Clear previous vote(s) on this item
	$DB->query("DELETE FROM votes WHERE photo_id = {$photo_id} AND user_id = {$user_id}; ");
	
	// Record ballot
	$record = new Vote();
	$record->photo_id = $photo_id;
	$record->user_id = $user_id;
	$record->vote = $vote;
	$record->insert();
	
endif;

header("Location: " . BASE_URL);
