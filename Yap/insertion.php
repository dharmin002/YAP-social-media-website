<?php 
session_start();
include_once 'dbconnect.php';
//$uname = $_REQUEST['uname'];
$msg = $_REQUEST['msg'];
if(strcmp($msg,"")==0){
	header("chatbo.php");
	
}

$userid = $_SESSION['user_id'];

$frndid = $_SESSION['chat'];
//echo $userid;
//echo "next";
//echo $frndid;
$res1=mysql_query("SELECT * FROM users WHERE user_id='$userid'");
$userRow1=mysql_fetch_array($res1);
$res2=mysql_query("SELECT * FROM users WHERE user_id='$frndid'");
$userRow2=mysql_fetch_array($res2);

$uname = $userRow1['username'];
//$msg = $_SESSION['message'];



mysql_query("INSERT INTO logs(`username`, `msg`,fromid ,toid) VALUES('$uname', '$msg' ,'$userid', '$frndid')");

$result1 = mysql_query("SELECT * FROM logs WHERE (fromid='$userid' AND toid='$frndid') OR (fromid='$frndid' AND toid='$userid')");
?>

<html>
<head>
<style>
p.speech1
{
	left: 80%;
	position: relative;
	width: 200px;
	height: relative;
	text-align: center;
	line-height: 50px;
	background-color: #fff;
	border: 3px solid #666;
	-webkit-border-radius: 30px;
	-moz-border-radius: 30px;
	border-radius: 30px;
	-webkit-box-shadow: 2px 2px 4px #888;
	-moz-box-shadow: 2px 2px 4px #888;
	box-shadow: 2px 2px 4px #888;
}

p.speech2
{
	position: relative;
	width: 200px;
	height: relative;
	text-align: center;
	line-height: 50px;
	background-color: #fff;
	border: 3px solid #666;
	-webkit-border-radius: 30px;
	-moz-border-radius: 30px;
	border-radius: 30px;
	-webkit-box-shadow: 2px 2px 4px #888;
	-moz-box-shadow: 2px 2px 4px #888;
	box-shadow: 2px 2px 4px #888;
}
p.speech1 p {
  margin: 10px;
  font-size: 11px;
  color: #143463;
}
p.speech2 p {
  margin: 10px;
  font-size: 11px;
  color: #143463;
}

</style>
</head>
<body>

<?php
while($extract = mysql_fetch_array($result1)){
	mysql_query("UPDATE logs SET readmsg=1 WHERE (fromid='$userid' AND toid='$frndid') OR (fromid='$frndid' AND toid='$userid')");
	if($extract['fromid']==$userid){
		if(strcmp($extract['msg'],"*img*")!=0){
		
		?>
		<p class="speech1">
		<?php
 echo "<span class='msg'>" . $extract['msg']. "</span><br>";
 ?>
 </p>
 <?php
    }else{
    ?>
		<p class="speech1">
		<?php
 //echo "image will be loaded here";
 echo '<img height="300" width="200" src="data:image;base64,'.$extract['image'].' "> ';
 ?>
 </p>
 <?php		
		
	}
	}
	else{
		if(strcmp($extract['msg'],"*img*")!=0){
		?>
		<p class="speech2">
		<?php
		echo "<span class='msg'>" . $extract['msg']. "</span><br>";
	    ?>
		</p>
		<?php
		echo "<span class='uname'>". $extract['username'];
	}else{
		?>
		<p class="speech2">
		<?php
		echo '<img height="300" width="200" src="data:image;base64,'.$extract['image'].' "> ';
        ?>
        </p>
        <?php		
		
	}
}
}
?>
</body>