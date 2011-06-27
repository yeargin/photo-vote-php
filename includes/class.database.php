<?php

require DOC_ROOT . '/vendor/dbobject/init.php';

class User extends DBObject
{
    public function __construct($id = null) {
        parent::__construct('users', array('twitter_screenname', 'is_admin'), $id);
    }
	
	public function delete() {
		
		global $DB;
		
		// Cascasde delete
		$DB->query("DELETE FROM photos WHERE user_id = {$this->id}; ");
		$DB->query("DELETE FROM votes WHERE user_id = {$this->id}; ");
		parent::delete();
	}
}

class Photo extends DBObject
{
    public function __construct($id = null) {
        parent::__construct('photos', array('img_src', 'user_id', 'caption', 'credit', 'is_approved'), $id);
    }

	public function delete() {
		
		global $DB;
		
		// Cascasde delete
		$DB->query("DELETE FROM votes WHERE photo_id = {$this->id}; ");
		parent::delete();
	}

}

class Vote extends DBObject
{
    public function __construct($id = null) {
        parent::__construct('votes', array('photo_id', 'user_id', 'vote'), $id);
    }
}