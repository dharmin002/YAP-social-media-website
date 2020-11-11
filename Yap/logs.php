<?php 


session_start();
include_once 'dbconnect.php';
//$con = mysql_connect('localhost', 'root', '');
//mysql_select_db('chatbox', $con);

if(!isset($_SESSION['user_id']))
{
 header("Location: index.php");
}
$userid = $_SESSION['user'];
//$userid = $_SESSION['user'];
$frndid = $_SESSION['chat'];
//echo $userid;
//echo "next";
//echo $frndid;
 $res1=mysql_query("SELECT * FROM users WHERE user_id='$userid'");
 $row1=mysql_fetch_array($res1);
 
  $res2=mysql_query("SELECT * FROM users WHERE user_id='$frndid'");
 $row2=mysql_fetch_array($res2);
 
 
$email = "dharmin002@yahoo.co.in";
 $res=mysql_query("SELECT * FROM users WHERE email='$email'");
 $row=mysql_fetch_array($res);
 
 
 
/*$res1=mysql_query("SELECT * FROM users WHERE user_id='$userid'");
$userRow1=mysql_fetch_array($res1);
$res2=mysql_query("SELECT * FROM users WHERE user_id='$frndid'");
$userRow2=mysql_fetch_array($res2);


$uname = $userRow1['username'];

$fromid = $userRow1['user_id'];
$toid = $userRow2['user_id'];
*/
$uname = $row1['username'];

//$fromid = $row1['user_id'];
//$toid = $row2['user_id'];

//$res = mysql_query("SELECT * FROM logs");
//$resu1 = mysql_query("SELECT * FROM logs WHERE fromid='$userid' OR toid='$userid'");
//$result1 = mysql_query("SELECT * FROM logs ORDER by id DESC WHERE fromid='$fromid' OR toid='$fromid'");
$result1 = mysql_query("SELECT * FROM logs WHERE (fromid='$userid' AND toid='$frndid') OR (fromid='$frndid' AND toid='$userid')");

while($extract = mysql_fetch_array($result1)){
 echo "<span class='uname'>". $extract['username']. " :". "</span:<span class='msg'>" . $extract['msg']. "</span><br>";
 
}

?>﻿
