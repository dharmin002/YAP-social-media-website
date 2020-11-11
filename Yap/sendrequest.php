<?php
	include_once 'dbconnect.php';	
	require 'core.inc.php';
		if(isset($_POST['friend_id'])){
			$friend = $_POST['friend_id'];
			$you = $_SESSION['user_id'];
			$to = 'friends_'.getuserfield('Email',$friend);
			$from = 'friends_'.getuserfield('Email',$_SESSION['user_id']);
			$query1 = "INSERT INTO `$from`(friend_id,req_sent) VALUES ('$friend','1')";
			$query2 = "INSERT INTO `$to`(friend_id,req_received) VALUES ('$you','1')"; 	
			if($query_run1 = mysql_query($query1)){
					echo ' Insert query run';					
			}
			else{
				echo mysql_error();	
			}
			if($query_run2 = mysql_query($query2)){
					echo ' Friend request sent.';			
			}
			else{
				echo mysql_error();	
			}
		}
		else
			echo 'nonsense';
	
		header('Location: Profile.php');




?>