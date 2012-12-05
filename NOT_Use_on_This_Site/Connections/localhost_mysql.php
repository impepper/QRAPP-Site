<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_localhost_mysql = "localhost";
$database_localhost_mysql = "mcms";
$username_localhost_mysql = "root";
$password_localhost_mysql = "test";
$localhost_mysql = mysql_pconnect($hostname_localhost_mysql, $username_localhost_mysql, $password_localhost_mysql) or trigger_error(mysql_error(),E_USER_ERROR); 
?>