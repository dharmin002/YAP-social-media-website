<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>Yap</title>	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="index/css/bootstrap.css">
	<link rel="stylesheet" href="index/css/main.css">
	<script src="index/js/jquery.js"></script>
	<script src="index/js/bootstrap.js"></script>
	<script src="index/js/validator.js"></script>
</head>

<body>  			
	<div id="big_wrapper">
		<!--<nav id ="nav_bar" class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span> 
					</button>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">			
						<li class="active custom1"><a href="#">Home</a></li>
						<li><a href="#">About</a></li>															
						<li><a href="#">Contact Us</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">					
						<li><button type="button" class="btn nav-btn btn-info" data-toggle="modal" data-target="#popUpWindow">Log-In</button></li>
						<li><form method="get" action="signup.html"><button type="submit" class="btn nav-btn btn-info">Sign-Up</button></form></li>
						<li><a href="" data-toggle="modal" data-target="#popUpWindow"><span class="glyphicon glyphicon-user"></span> Log-In</a></li>
						<li><a href="signup.html"><span class="glyphicon glyphicon-log-in"></span> Sign-Up</a></li>			
					</ul>				
				</div>			
			</div>					
		</nav>
				
		<div id="myCarousel" class="carousel slide carousel-custom" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
				<li data-target="#myCarousel" data-slide-to="3"></li>
			</ol>

		
			<div class="carousel-inner slide-custom" role="listbox">
				<div class="item active">
					<img src="hpg1.jpg" alt="hpg1">
				</div>

				<div class="item">
					<img src="hpg2.jpg" alt="hpg2">
				</div>

				<div class="item">
					<img src="hpg3.jpg" alt="hpg3">
				</div>

				<div class="item">
					<img src="hpg4.jpg" alt="hpg4">
				</div>
			</div>

			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>-->
		<div id="home">
			<div class="overlay img-responsive">
				<div class="container">
					<div class="row scroll-me" >
						<div class="col-md-6 quote">
						<div id="logo">
							<img src="index/img/logo3.png" width="200">
						</div>
						<h4>
							"If you want to go fast, go alone.<br>
							If you want to go far,<br>
							go with the others.<br>
							If he could not go out into the world,<br> the world could come to him.”

						</h4>
						<a href="#about" class="btn btn-custom btn-one" data-toggle="modal" data-target="#popUpWindow">Sign In Now!</a>
						</div>	

						<div class="col-md-offset-2 col-sm-4 register">
							<form action="register.php" method="POST" class="form-horizontal" role="form">
								<h3 text-align="middle"><b>Register!</b></h3>
								<br>	
								<div class="form-group">
									<label for="first name"></label>
									<div class="col-sm-6">
										<input type="text" class="input-lg form-control" id="firstname" placeholder="First Name" name="fname">
									</div>
									<label for="lastname"></label>
									<div class="col-sm-6">
										<input type="text" class="input-lg form-control" id="lastname" placeholder="Last Name" name="lname">
									</div>
								</div>
	
								<br>
								<div class="form-group">				
									<label for="email"></label>
									<div class="col-sm-12">
										<input type="email" class="form-control input-lg" id="email" placeholder="Enter Email-Id" name="email">
									</div>
								</div>	
								<br>
								<div class="form-group">
									<label for="pword"></label>
									<div class="col-sm-12"> 
										<input type="password" class="form-control input-lg" id="pwd" placeholder="Enter Password" name="password">
									</div>
								</div>
								<br>
								<div class="form-group">
									<label for="pword"></label>
									<div class="col-sm-12"> 
										<input type="password" class="form-control input-lg" id="repwd" placeholder="Re-enter Password" name="rpassword">
									</div>
								</div>
								<br>
								<div class="form-group" id="button"> 
									<div class="col-sm-offset-4 col-sm-4" > 
										<button type="submit" align="center" class="btn btn-custom btn-one">Create Account!</button>
									</div>
								</div>
							</form>			
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		
		
		<div class="modal fade" id="popUpWindow">
			<div class="modal-dialog">
				<div class="modal-content">

                <!-- header -->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title">Log In</h3>
					</div>

                <!-- body (form) -->
					<div class="modal-body">
						<form action="login.php" method="POST" role="form" name="loginform">
							<div class="form-group">
								<input type="email" class="input-lg form-control" placeholder="Email" name="email">
							</div>
							<div class="form-group">
								<input type="password" class="input-lg form-control" placeholder="Password" name="password">
							</div>
							<!--<div class="col-sm-12">
								<div class="checkbox">
									<label><input type="checkbox"> Remember me</label>
								</div>
							</div>-->	
							<div class="modal-footer">								
								<button class="btn btn-custom btn-one" type="submit" name="submit">Log-In</button>
							</div>								
						</form>
					</div>

                <!-- button -->
					
	
				</div>
			</div>
		</div>
		
		
		
		<!--<div id="wrapper">	
			<section id="main_section">				
			</section>		
		</div>	
		<footer id="the_footer">	
		</footer>	
	</div>-->
</body>

</html>