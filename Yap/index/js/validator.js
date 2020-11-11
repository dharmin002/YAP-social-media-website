function validator(){
	if(!document.loginform.email.value)
		alert("Email Field Empty");
	else if(!document.loginform.password.value)
			alert("Password field empty");
		else{
			window.location = "login.php";
		}
	}
