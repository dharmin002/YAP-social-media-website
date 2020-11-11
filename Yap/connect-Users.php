<?php
$mysql_host = 'localhost';
$mysql_user = 'root';
$my_sql_pass = 'baNtu9514%10';
$mysql_db = 'ost';

if(!mysql_connect($mysql_host,$mysql_user,$my_sql_pass)||!mysql_select_db($mysql_db)){
	die(mysql_error());
}
else{
	//echo 'Successful connection';
}
?>