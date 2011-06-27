<?php

require '../includes/master.inc.php';

if ($_SESSION['is_admin'] != true)
	header('Location: ' . BASE_URL);

// Approve/unapprove photo
if (isset($_GET['photo_id']) && isset($_GET['is_approved'])):
	$photo_id = (int) $_GET['photo_id'];
	$is_approved = (int) $_GET['is_approved'];
	$record = new Photo($photo_id);
	$record->is_approved = $is_approved;
	$record->update();
endif;

// Delete Photo
if (isset($_GET['photo_id']) && isset($_GET['delete'])):
	$photo_id = (int) $_GET['photo_id'];
	$record = new Photo($photo_id);
	$record->delete();
endif;


$unapprovedPhotos = $DB->getRows("SELECT p.id, p.img_src, caption, credit, sum(v.vote) AS total FROM photos p LEFT JOIN votes v ON p.id = v.photo_id WHERE is_approved = 0 GROUP BY 1 ORDER BY 5 DESC; ");
$Smarty->assign('unapprovedPhotos', $unapprovedPhotos);

$approvedPhotos = $DB->getRows("SELECT p.id, p.img_src, caption, credit, sum(v.vote) AS total FROM photos p LEFT JOIN votes v ON p.id = v.photo_id WHERE is_approved = 1 GROUP BY 1 ORDER BY 5 DESC; ");
$Smarty->assign('approvedPhotos', $approvedPhotos);

$Smarty->display('admin/photos.tpl');