<?php

require 'includes/master.inc.php';

$top10 = $DB->getRows("SELECT p.id, p.img_src, caption, credit, sum(v.vote) AS total FROM photos p INNER JOIN votes v ON p.id = v.photo_id WHERE is_approved = 1 GROUP BY 1 ORDER BY 5 DESC LIMIT 10; ");
$Smarty->assign('top10', $top10);

$bottom10 = $DB->getRows("SELECT p.id, p.img_src, caption, credit, sum(v.vote) AS total FROM photos p INNER JOIN votes v ON p.id = v.photo_id WHERE is_approved = 1 GROUP BY 1 ORDER BY 5 ASC LIMIT 10; ");
$Smarty->assign('bottom10', $bottom10);

$Smarty->display('leaders.tpl');