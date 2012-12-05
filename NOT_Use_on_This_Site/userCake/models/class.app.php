<?php
/*
UserCake Version: 2.0.1
http://usercake.com
*/

class loggedInApp {
	public $app_title = NULL;
	public $app_desc = NULL;
	public $app_id = NULL;
	
	/*
	//Simple function to update the last sign in of a user
	
	public function updateLastSignIn()
	{
		global $mysqli,$db_table_prefix;
		$time = time();
		$stmt = $mysqli->prepare("UPDATE ".$db_table_prefix."users
			SET
			last_sign_in_stamp = ?
			WHERE
			id = ?");
		$stmt->bind_param("ii", $time, $this->user_id);
		$stmt->execute();
		$stmt->close();	
	}
	
	//Return the timestamp when the user registered
	public function signupTimeStamp()
	{
		global $mysqli,$db_table_prefix;
		
		$stmt = $mysqli->prepare("SELECT sign_up_stamp
			FROM ".$db_table_prefix."users
			WHERE id = ?");
		$stmt->bind_param("i", $this->user_id);
		$stmt->execute();
		$stmt->bind_result($timestamp);
		$stmt->fetch();
		$stmt->close();
		return ($timestamp);
	}
	*/
	
	//Update a apps title
	public function updateTitle($app_title)
	{
		global $mysqli,$db_table_prefix;
		$this->app_title = $app_title;
		$stmt = $mysqli->prepare("UPDATE ".$db_table_prefix."user_apps
			SET
			title = ? 
			WHERE
			app_id = ?");
		$stmt->bind_param("si", $app_title, $this->app_id);
		$stmt->execute();
		$stmt->close();	
	}
	
	//Update a apps description
	public function updateDesc($app_desc)
	{
		global $mysqli,$db_table_prefix;
		$this->app_desc = $app_desc;
		$stmt = $mysqli->prepare("UPDATE user_apps
			SET 
			description = ?
			WHERE
			app_id = ?");
		$stmt->bind_param("si", $app_desc, $this->app_id);
		$stmt->execute();
		$stmt->close();	
	}
	
}

?>