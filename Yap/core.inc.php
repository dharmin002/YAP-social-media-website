<?php
	ob_start();
	session_start();
	require 'connect-Users.php';
	$current_file = $_SERVER['SCRIPT_NAME'];
	$http_referer = $_SERVER['HTTP_REFERER'];
	
	function getuserfield($field,$id){
		$query = "SELECT `$field` FROM `users` WHERE `id`='$id' ";
		if($query_run = mysql_query($query))
			return mysql_result($query_run, 0, $field);
	}
	
	function getfriend($email){
		$query1 = "SELECT * FROM `friends_$email` WHERE `friends`=1";
		if($query_run1 = mysql_query($query1)){
			if($query_run1){
				while($row = mysql_fetch_array($query_run1)){
					$name = getuserfield('Fname',$row[0])." ".getuserfield('Lname',$row[0]);
					echo '<html><br>
							<head>
								<link rel="stylesheet" href="profile.css">
							</head>
							<body>
								<h4>'.$name.'</h4>
								<button type="submit" class="btn btn-info btn-md">Chat</button>
								<br>
							</body>						
					
						</html>';
				}
				
			}
		}
		else
			echo mysql_error();
	}
	function isfriend($email,$id){
		$query1 = "SELECT * FROM `friends_$email` WHERE `friend_id`=$id";
		if($query_run = mysql_query($query1)){
			if(mysql_num_rows($query_run)){				
				while($row=mysql_fetch_assoc($query_run)){
					if($row['friends']!=NULL||$row['req_sent']==1||$row['req_received']==1)
						return true;
					else
						return false;
				}
			}
		}
		else
			echo mysql_error();
	}
	
	function notifications($email){
		$query1 = "SELECT * FROM `friends_$email` WHERE `req_received`=1 AND `friends` IS NULL ";
		$query2 = "SELECT * FROM `friends_$email` WHERE `friends` = 1";
		if($query_run1 = mysql_query($query1)){
			if($query_run1){
				echo 'The following people have sent you friend requests'."\n";
				echo '<html><br></html>';
				while($row = mysql_fetch_array($query_run1)){
					$name = getuserfield('Fname',$row[0])." ".getuserfield('Lname',$row[0]);
					$from = getuserfield('Email',$row['friend_id']);
					echo '<html><br>
							<head>
								<link rel="stylesheet" href="profile.css">
							</head>
							<body>
								<article>
									<div class="searchresult">
										<img src="profile/img/profile.jpeg" class="img-circle img-responsive"width="50px height="50px">
										<h4>'.$name.'</h4>
										
										<form action="notificationupdate.php" method="post">											
											<input type="hidden" name="friend_id" value='.$row[0].'>
											<button type="submit" class="btn btn-custom btn-one btn-md" name="accept">Accept</button>
											<button type="submit" class="btn btn-custom btn-one btn-md" name="ignore">Ignore</button>
											<button type="submit" class="btn btn-custom btn-one btn-md" name="block">Block</button>
										</form>
									<div>
								</article><?php
								
							</body>						
					
						</html>';
				}				
			}			
		}
		else
			echo mysql_error();
		if($query_run2 = mysql_query($query2)){
			if($query_run2){
				echo 'You are now friends with : ';
				while($row = mysql_fetch_array($query_run2)){
					$name = getuserfield('Fname',$row[0])." ".getuserfield('Lname',$row[0]);
					$email = getuserfield('Email',$row[0]);
					echo '<html><br>
							<head>
								<link rel="stylesheet" href="profile.css">
							</head>
							<body>
								<article>
									<div class="searchresult">
										<img src="profile/img/profile.jpeg" class="img-circle img-responsive"width="50px height="50px">
										<h4>'.$name.'</h4>
										
										<form action="notificationupdate.php" method="post">											
											<input type="hidden" name="friend_id" value='.$row[0].'>
											<button type="submit" class="btn btn-custom btn-one btn-md" name="clear">Okay. Got it!</button>
											
										</form>
									<div>
								</article><?php
								
							</body>						
					
						</html>';
				}
			}
		}
		else	
			echo mysql_error();
		
		
	}
	
	function posts($email){
		echo 'yo';
		
		
	}
	
	

?>