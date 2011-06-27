<?php

require '../includes/master.inc.php';

if ($_SESSION['is_admin'] != true)
	header('Location: ' . BASE_URL);

$Smarty->display('admin/main.tpl');