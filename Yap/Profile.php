<?php
require 'core.inc.php';
require 'connect-Users.php';

if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
			$fname = getuserfield('Fname',$_SESSION['user_id']);
			$lname = getuserfield('Lname',$_SESSION['user_id']);
			$status = getuserfield('Status',$_SESSION['user_id']);
			$email = getuserfield('Email',$_SESSION['user_id']);
			$profilename = $email.'.jpg';
			echo '<html>
					<head>
						<meta charset="utf-8"/>
						<title>Profile</title>	
						<meta name="viewport" content="width=device-width, initial-scale=1">
						<link rel="stylesheet" href="profile/css/bootstrap.css">
						<link rel="stylesheet" href="profile/css/profile.css">
						<script src="index/js/jquery.js"></script>
						<script src="index/js/bootstrap.js"></script>
					</head>
			
					<body>
						<div id="big_wrapper">
						
							
							
							<nav id ="nav_bar" class="navbar navbar-inverse navbar-fixed-top">
								<div class="container-fluid">
									<div class="sidebar">
										<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span> 
										</button>
									</div>
									<div class="collapse navbar-collapse" id="myNavbar">
										<ul class="nav navbar-nav">			
											
										</ul>
										<ul class="nav navbar-nav navbar-right">	
											<li class="active custom1"><a href="#">Home</a></li>
											<li class="custom1"><a href="#">Chat Room</a></li>															
											<li class="dropdown"><a href="#">'.$fname.' '.$lname.'<span class="caret"></span></a>
												<ul class="dropdown-menu">
													<li><a href="#">HTML</a></li>
													<li><a href="#">CSS</a></li>
													<li><a href="#">JavaScript</a></li>
												</ul>				
											
											</li>
											<li class="custom1"><a href="logout.php"><span class="glyphicon glyphicon-log-out"> Log-Out</span></a></li>
										</ul>				
									</div>			
								</div>					
							</nav>
							
							
							<div class="cover">
								<img src="profile/img/cover.jpg" class="img-responsive coverpic" alt="cover">
							</div>	
<!--issue --> 				<div class="profile">
								<img src="profile/img/profile.jpeg" class="img-circle img-responsive profilepic" alt="" width="150" height="150" >
							</div>	
							<br>
							<div class="status">
								"'.$status.'"
							</div>
							
							<br><br>
							<form action="searchengine.php" method="get">
								<div class="form-group row">									
									<div class="input-group col-md-offset-3 col-sm-6 custom-search-input">						
										<input type="text" class="form-control input-md search-query" placeholder="Search For People." name="search"/>
										<span class="input-group-btn">
											<button type="submit" class="btn btn-default">
												<span class="glyphicon glyphicon-search"></span>
											</button>
										</span>
									</div>
								</div>
							</form>			
							<br>	

							
							<div id="wrapper">
								<h3 id="name">'.$fname.' '.$lname.'</h3>
								<br>
								<div class="tabs">
									<ul class="nav nav-tabs">
										<li class="active"><a data-toggle="tab" href="#wall">My Wall</a></li>
										<li><a data-toggle="tab" href="#myfriends">My Friends</a></li>
										<li><a data-toggle="tab" href="#notifications">Notifications</a></li>
									
									</ul>
									<div class="tab-content">
										<div id="wall" class="tab-pane fade in active">
											<h3>WALL</h3>
											';posts($email);										
			echo						'</div>
										<div id="myfriends" class="tab-pane fade">
											<h3>My Friends</h3>
											';getfriend($email);
			echo 						'</div>
										<div id="notifications" class="tab-pane fade">
											<h3>Notifications</h3>
											';notifications($email);
			echo						'</div>
										
									</div>
								</div>
			
														
								
								<section id="main_section">				
								</section>		
							</div>	
							
							
							<footer id="the_footer">	
							</footer>						
							
						</div>
						
						
					</body>
				</html>';
	}	
	else{
		echo 'Web Page Not Available';
	}
?>

		

