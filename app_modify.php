<?php 

require_once("models/config.php");

securePage($_SERVER['PHP_SELF']);

//Prevent the user visiting the logged in page if he/she is already logged in
if(!isUserLoggedIn()) { header("Location: usr_login.php"); die(); }

//Forms posted
if(!empty($_GET))
{

	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("UPDATE ".$db_table_prefix."user_apps SET description='".trim($_GET["new_description"])."' WHERE (user_id=".$loggedInUser->user_id.") AND (title= '".trim($_GET["using_apptitle"])."');" );						
	$stmt->execute();
	$stmt->close();
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
</body>
</html>