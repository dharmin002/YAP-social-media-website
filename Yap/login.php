<?php
require 'core.inc.php';
require 'dbconnect.php';
	
		if(isset($_POST['email'])&&isset($_POST['password'])){    
			$email = $_POST['email'];
			$password = $_POST['password'];
			$upass=md5($password);
			if(!empty($email)&&!empty($password)){
				$query = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$upass'"; 
				if($query_run = mysql_query($query)){
					echo 'Query run';
					$query_num_rows = mysql_num_rows($query_run);
					echo $query_num_rows;
					if($query_num_rows==0){
						echo 'Invalid';
					}
					else if($query_num_rows==1){
						$user_id = mysql_result($query_run,0,'user_id');
						$_SESSION['user_id'] = $user_id;	
						if(!empty($_SESSION['user_id'])){
							echo 'Logged in';
						}								
						header('Location: Profile.php');
					}
				}
				else{
					echo mysql_error();
					echo 'Query not run';
				}
			}
			else{
				echo 'Empty';
			}
		}
?>