<?php
/*
UserCake Version: 2.0.1
http://usercake.com
*/

//Database Information (local DB)
$db_host = "localhost"; //Host address (most likely localhost)
//Database Information (Hosting Server DB)
//$db_host = "mcms.fuihan.com"; //Host address (most likely localhost)
//$db_host = "192.168.3.101"; //Host address (most likely localhost)


$db_name = "hungsing_mcms"; //Name of Database
$db_user = "hungsing_mcms"; //Name of database user
$db_pass = "hala0204"; //Password for database user
$db_table_prefix = "uc_";


GLOBAL $errors;
GLOBAL $successes;

$errors = array();
$successes = array();

/* Create a new mysqli object with database connection parameters */
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
GLOBAL $mysqli;

if(mysqli_connect_errno()) {
	echo "Connection Failed: " . mysqli_connect_errno();
	exit();
}

//Direct to install directory, if it exists
if(is_dir("install/"))
{
	header("Location: install/");
	die();

}

?>