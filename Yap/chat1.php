<?php
session_start();
include_once 'dbconnect.php';



if(isset($_POST['btnChat']))
{
	echo "bc";
	$frnd = mysql_real_escape_string($_POST['frndname']);
	$result=mysql_query("SELECT * FROM users WHERE username='$frnd'");
$row=mysql_fetch_array($result);

 if($row['username']==$frnd)
 {echo "ok";
	 //alert('correct details');
	 $frndid = $row['user_id'];
  $_SESSION['chat'] = $row['user_id'];
  header("Location: chatbo.php");
 }
 else
 {
  ?>
        <script>alert('wrong details');</script>
        <?php
		echo "bac";
 }
 
}

?>


<html>
<head>

</head>


<body>
<center>
<div id="chat-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="frndname" placeholder="friend name" required /></td>
</tr>
<tr>
<td><button type="submit" name="btnChat">Chat</button></td>
</tr>
