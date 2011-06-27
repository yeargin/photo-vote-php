<?php

require '../includes/master.inc.php';

if ($_SESSION['is_admin'] != true)
	header('Location: ' . BASE_URL);

// Make Admin/Demote User
if (isset($_GET['user_id']) && isset($_GET['is_admin'])):
	$user_id = (int) $_GET['user_id'];
	$is_admin = (int) $_GET['is_admin'];
	$record = new User($user_id);
	$record->is_admin = $is_admin;
	$record->update();
endif;

// Delete User
if (isset($_GET['user_id']) && isset($_GET['delete'])):
	$user_id = (int) $_GET['user_id'];
	$record = new User($user_id);
	$record->delete();
endif;


$adminUsers = $DB->getRows("SELECT * FROM users WHERE is_admin = 1 ORDER BY insert_ts DESC; ");
$Smarty->assign('adminUsers', $adminUsers);

$generalUsers = $DB->getRows("SELECT * FROM users WHERE is_admin = 0 ORDER BY insert_ts DESC; ");
$Smarty->assign('generalUsers', $generalUsers);

$Smarty->display('admin/users.tpl');