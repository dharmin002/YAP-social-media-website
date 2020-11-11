<?php
require 'connect-Users.php';
require 'core.inc.php';
if(isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['rpassword'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repassword = $_POST['rpassword'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	if(!empty($email)&&!empty($password)&&!empty($repassword)&&!empty($fname)&&!empty($lname)){
		if($password==$repassword){
			$query1 = "SELECT `Id` FROM `users` WHERE `Email` = '$email'";
			$query_run1 = mysql_query($query1);			
			if(mysql_num_rows($query_run1)!=0){
				echo ' Already existing user';
			}
			else{
				$var = 'friends_'.$email;
				$query2 = "INSERT INTO users(Email,Password,Fname,Lname) VALUES ('$email','$password','$fname','$lname')"; 
				$query3 = "CREATE TABLE `ost`.`$var`( `friend_id` INT NOT NULL , `req_sent` BOOLEAN NOT NULL DEFAULT FALSE , `req_received` BOOLEAN NOT NULL DEFAULT FALSE , `friends` BOOLEAN NULL DEFAULT NULL )";
				$var = 'posts_'.$email;
				$query4 = "CREATE TABLE `ost`.`$var`(`post_id` INT NOT NULL AUTO_INCREMENT , `post` VARCHAR(500) NOT NULL , PRIMARY KEY (`post_id`))";
				if($query_run2 = mysql_query($query2)){
					echo ' Insert query run';
					
					header('Location: index.php');
				}
				else{
					echo mysql_error();	
				}
				
				if($query_run3 = mysql_query($query3)){
					echo ' Create table query run';
				
				}
				else{
					echo mysql_error();	
				}
				if($query_run4 = mysql_query($query4)){
					echo ' Create table query run';
				
				}
				else{
					echo mysql_error();	
				}
				
			}
			
		}
		else{
			echo ' Passwords dont match';
		}
	}
	else
		echo ' Empty';
}


?>
