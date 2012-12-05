<?php


class App 
{
	
	public $user_id= Null;
	private $title = Null;
	private $desc = Null;
	
	public $app_active = 0;
	public $status = false;
	public $sql_failure = false;
	public $appTitle_taken = false;
	public $success = NULL;
	
	function __construct($user_id,$title,$description)
	{
		//Used for display only
		$this->app_title = $title;
		
		//Sanitize
		$this->user_id = $user_id;
		$this->title = $title;
		$this->description = $description;
		
		//Checking before creation
		if(appTitleExists($this->title))
		{
			$this->appTitle_taken = true;
		}
		else
		{
			//No problems have been found.
			$this->status = true;
		}
	}
	
	public function AddApp()
	{
		global $mysqli,$emailActivation,$websiteUrl,$db_table_prefix;
		
		//Prevent this function being called if there were construction errors
		if($this->status)
		{			
			//Instant account activation
			$this->app_active = 1;
			$this->success = lang("APP_CREATION_COMPLETE_TYPE1");
			
			//Insert the app into the database providing no errors have been found.
			$stmt = $mysqli->prepare("INSERT INTO ".$db_table_prefix."user_apps (
				user_id,
				title,
				description,
				create_stamp
				)
				VALUES (
				?,
				?,
				?,
				'".time()."')");
				
			$stmt->bind_param("iss", $this->user_id,$this->title, $this->description);
			$stmt->execute();
			$this->app_id = $mysqli->insert_id;
			$stmt->close();
		}
	}
}

?>