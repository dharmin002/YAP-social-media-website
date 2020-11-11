
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Search Results</title>	
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="profile/css/bootstrap.css">
		<link rel="stylesheet" href="profile/css/profile.css">
		<script src="index/js/jquery.js"></script>
		<script src="index/js/bootstrap.js"></script>
				
		<script type="text/javascript">
			$('button#request').click(function(){

			$.ajax({
				url : 'sendrequest',
				data : {
				id : '1' // send sample data to url
				},
				type: json,
				sucess: function(response){
				//Your script
				});
			});

		});
		</script>
	</head>
	<body>
	<?php 
		require 'core.inc.php';
		require 'dbconnect.php';
		$fname = getuserfield('Fname',$_SESSION['user_id']);
		$lname = getuserfield('Lname',$_SESSION['user_id']);
	?>
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
							<li class="custom1"><a href="Profile.php">Home</a></li>
							<li class="custom1"><a href="#">Chat Room</a></li>															
							<li class="dropdown"><a href="#"><?php echo $fname.' '.$lname?><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">HTML</a></li>
									<li><a href="#">CSS</a></li>
									<li><a href="#">JavaScript</a></li>
								</ul>				
							</li>
							<li class="custom1"><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
						</ul>				
					</div>			
				</div>					
			</nav>
							
							
			<div class="cover">
				<img src="profile/img/cover.jpg" class="img-responsive coverpic" alt="cover">
			</div>	
			<div class="profile">
				<img src="profile/img/profile.jpeg" class="img-circle img-responsive" alt="" width="150" height="150" >
			</div>
			<br><br>
			<form action="searchengine.php" method="get">
				<div class="form-group row">
					<div class="input-group col-md-offset-3 col-sm-6 custom-search-input">						
						<input type="text" class="form-control input-md search-query" placeholder="Search For People." name="search" value='<?php echo $_GET['search']; ?>'/>
						<span class="input-group-btn">
							<button type="submit" class="btn btn-default">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</span>
					</div>
				</div>
			</form>	
			<br>
			<hr />
			
			<div id="wrapper">
				<h3 id="name">Search Results</h3>
				<br>
				<section id="main-section">
					<?php   
					require 'dbconnect.php';
					$search = $_GET['search'];
					$terms = explode(" ", $search);
					$query = "SELECT * FROM users WHERE `Fname` LIKE";
					foreach($terms as $word){					
						if($query_run = mysql_query($query."'%$word%' OR `Lname` LIKE '%$word%'")){
							if(mysql_num_rows($query_run)){				
								while($row=mysql_fetch_assoc($query_run)){
									?>
									<article>
										
										<div class="searchresult">
											<img src="profile/img/profile.jpeg" class="img-circle img-responsive"width="50px height="50px">
											<form action="sendrequest.php" method="post">
												<?php echo $row['Fname'].' '.$row['Lname'];?>
												<input type="hidden" name="friend_id" value=<?php echo $row['user_id']; ?>>
												<?php if(isfriend(getuserfield('email',$_SESSION['user_id']),$row['user_id'])||$row['email']==getuserfield('email',$_SESSION['user_id'])){}
												else{	
												echo '<button type="submit" class="btn btn-custom btn-one btn-sm">Send Request!</button>';
												}?>
											</form>
										<div>
									</article><?php
								}		
							}
							else{
								echo 'No Results to display!';
						
							}
						}
						else{					
							echo mysql_error();	
						}
					}				
				
					?>
				</section>	
			</div>
		</div>
	</body>
</html>

