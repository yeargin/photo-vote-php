<?php

require 'includes/master.inc.php';

if (isset($_POST['agree']) && $_POST['agree'] == 1 && isset($userInfo->screen_name)):
	
	// File
	$file_name = strtolower($userInfo->screen_name) . '-' . time() . '.jpg';
	$target_path = DOC_ROOT . "/uploads/photos/";
	$target_path = $target_path . $file_name; 
	$upload_status = move_uploaded_file($_FILES['photo']['tmp_name'], $target_path);
	
	// Add database row
	if ($upload_status):

		// Manimpulate the image
		$imageProcess = new GD($target_path);
		$imageProcess->scale('450');
		$imageProcess->saveAs($target_path);
	
		// Add to the database;
		$record = new Photo();
		$record->img_src = '/uploads/photos/' . $file_name;
		$record->user_id = (int) $_SESSION['user_id'];
		$record->caption = $_POST['caption'];
		$record->credit = $userInfo->screen_name;
		$photo_id = $record->insert();
		
		// Sending a mail message
		$transport = Swift_MailTransport::newInstance();
		$mailer = Swift_Mailer::newInstance($transport);
	
		$message = Swift_Message::newInstance('New photo submission from ' . $record->credit);
		$message->setTo(array(NEW_PHOTO_NOTIFY));
		$message->setBody('A new photo has been added! View this photo at ' . BASE_URL . '/admin/photo.php?id=' . (int) $photo_id, 'text/plain');
	
		// Send the message
		$mailer->send($message);
	
	else:
		$Error->add('FILE_UPLOAD_FAILED', 'The file upload failed to complete.');
	endif;
	
	if (file_exists($target_path)):
		$Smarty->assign('photoUploaded', true);
	else:
		$Smarty->assign('photoUploaded', false);
	endif;
	
endif;

$Smarty->display('submit.tpl');