<?php
	require 'connect-Users.php';	
	require 'core.inc.php';
	if(isset($_POST['accept'])){
		$email = getuserfield('Email',$_SESSION['user_id']);
		echo $email;
		$id = $_POST['friend_id'];
		echo $id;
		echo 'id';
		$query1 = "UPDATE `friends_$email` set `friends` = 1 WHERE friend_id= $id";
		$from = getuserfield('Email',$_POST['friend_id']);
		$query2 = "UPDATE `friends_$from` set `friends` = 1 WHERE `friend_id` = $_SESSION[user_id]";
		echo 'gghredcp\n';
		if($query_run1 = mysql_query($query1)){
			echo 'gogogogog\n';
			if($query_run2 = mysql_query($query2)){
				header('Location: Profile.php');
			}
			else
				echo mysql_error();
		}
		else{
			echo mysql_error();
		}
	}
	else if(isset($_POST['ignore'])){
		$email = getuserfield('Email',$_SESSION['user_id']);
		$id = $_POST['friend_id'];
		$query1 = "DELETE FROM `friends_$email` WHERE `friend_id` = $id";
		$from = getuserfield('Email',$_POST['friend_id']);
		$query2 = "DELETE FROM `friends_$from` WHERE `friend_id` = $_SESSION[user_id]";
		if($query_run1 = mysql_query($query1)){
			if($query_run2 = mysql_query($query2)){
				header('Location: Profile.php');
			}
			else
				echo mysql_error();
		}
		else
			echo mysql_error();
	}	
	else if(isset($_POST['block'])){
		$email = getuserfield('Email',$_SESSION['user_id']);
		$id = $_POST['friend_id'];
		$query1 = "UPDATE `friends_$email` set `friends` = 0 WHERE `friend_id` = $id";
		$from = getuserfield('Email',$_POST['friend_id']);
		$query2 = "UPDATE `friends_$from` set `friends` = 0 WHERE `friend_id` = $_SESSION[user_id]";
		if($query_run1 = mysql_query($query1)){
			if($query_run2 = mysql_query($query2)){
				header('Location: Profile.php');
			}
			else
				echo mysql_error();
		}
		else
			echo mysql_error();
	}		
	
	
	
?>