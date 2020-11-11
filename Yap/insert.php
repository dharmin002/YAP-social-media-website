<?php 
session_start();
//$con = mysql_connect('localhost', 'root', '');
//mysql_select_db('chatbox', $con);
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}
?>
<script>alert('welcome');</script>
<?php
$res1=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow1=mysql_fetch_array($res1);
$res2=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['chat']);
$userRow2=mysql_fetch_array($res2);


$uname = $userRow1['username'];
//$msg = $_REQUEST['msg'];
//echo $msg;
$msg = $_SESSION['message'];
//$fromid = $userRow1['user_id'];
//$toid = $userRow2['user_id'];

$userid = $_SESSION['user'];

$frndid = $_SESSION['chat'];


mysql_query("INSERT INTO logs(`username`, `msg`,fromid ,toid) VALUES('$uname', '$msg' ,'$userid', '$frndid')");

$result1 = mysql_query("SELECT * FROM logs WHERE (fromid='$userid' AND toid='$frndid') OR (fromidid='$frndid' AND toid='$userid')");
echo mysql_error();
echo $userid;
echo "next";
echo $frndid;
while($extract = mysql_fetch_array($result1)){
 echo "<span class='uname'>". $extract['username']." :". "</span:<span class='msg'>" . $extract['msg']. "</span><br>";
 
}

?>﻿
