<?php

require_once("models/config.php");
securePage($_SERVER['PHP_SELF']);

//Log the user out
if(isUserLoggedIn())
{
	$loggedInUser->userLogOut();
}

if(!empty($websiteUrl)) 
{
	$add_http = "";
	
	if(strpos($websiteUrl,"http://") === false)
	{
		$add_http = "http://";
	}
	// for real site
	//header("Location: ".$add_http.$websiteUrl);
	
	// for testing server
	header("Location: ".$add_http.'localhost/mcms');
	die();
}
else
{
	header("Location: http://".$_SERVER['HTTP_HOST']);
	die();
}	

?>

