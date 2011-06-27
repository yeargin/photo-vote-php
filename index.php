<?php

require('includes/master.inc.php');

if (isset($_GET['photo_id'])):

	// Get specific photo
	$photo_id = (int) $_GET['photo_id'];
	$photo = $DB->getRows("SELECT p.id, img_src, caption, credit FROM photos p WHERE is_approved = 1 AND id = {$photo_id}; ");

else:

	// Get random photo
	$photo = $DB->getRows("SELECT p.id, img_src, caption, credit, rand() FROM photos p LEFT JOIN votes v ON p.id = v.photo_id  WHERE is_approved = 1 ORDER BY 5 LIMIT 1; ");

endif;

if (is_array($photo)):
	$Smarty->assign('photo', array_shift($photo));
else:
	$Smarty->assign('photo', null);
endif;

$Smarty->display('main.tpl');