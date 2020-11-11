<?php
session_start();
include_once 'dbconnect.php';
 if(isset($_POST['sumit'])){
                             
                
				if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
                {
                    echo "Please select an image.";
                }
                else
                {
                    $image= addslashes($_FILES['image']['tmp_name']);
                    $name= addslashes($_FILES['image']['name']);
                    $image= file_get_contents($image);
                    $image= base64_encode($image);
                    saveimage($name,$image);
                }
            }
           
            function saveimage($name,$image)
            {
                
                $userid = $_SESSION['user_id'];
                $frndid = $_SESSION['chat'];
				
                $res1=mysql_query("SELECT * FROM users WHERE user_id='$userid'");
                $userRow1=mysql_fetch_array($res1);
                

                $uname = $userRow1['username'];
				$msg="*img*";
				mysql_query("INSERT INTO logs(username, msg,fromid ,toid ,iname ,image) VALUES('$uname', '$msg' ,'$userid', '$frndid', '$name', '$image')");
            }


?>

<html>
<head>
<title>Chat Box</title>
<link rel = "stylesheet" type="text/css" href ="chat.css"/>
<script src="http://code.jquery.com/jquery-1.9.0.js"></script>
<script>
function submitChat(){

 var msg = form1.msg.value;
 var xmlhttp = new XMLHttpRequest();
 
 xmlhttp.onreadystatechange = function(){
 if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
  document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
 
           }
 
 }
 xmlhttp.open('GET','insertion.php?msg='+msg , true);
 xmlhttp.send();
 
 
}
$(document).ready(function(e){
 $.ajaxSetup({cache:false});
 setInterval(function(){$('#chatlogs').load('logs1.php');}, 2000);
});
</script>

<style>
body {
    background-image: url("bg.jpg");
   
}
p.groove {
	    border:1px solid red;
    margin-top: 100px;
    
    margin-right: 150px;
    margin-left: 80px;
	
}
p.gre{
           
       text-align: center;    
       bottom: 0px; 
       width: 100%;
}
p.chats {
	    position: absolute;

    margin-top: 100px;
    margin-bottom: 600px;
    margin-right: 150px;
    margin-left: 80px;
	
}

p.sendbt{

  bottom: 10;
    right: 30%;
}</style>

</head>
<body>

<form name = "form1">
<div id="chatlogs">
<p class="chats"> 
LOADING CHATLOGS PLEASE WAIT...</p>
</div>

<p class="gre">
<textarea name= "msg" width: 100%; border: 1px solid #333; padding: 4px;></textarea><br /></p>
<p class="sendbt"><a href= "#" onclick= "submitChat()"class= "button">Send</a><br /><br /></p>
</form>
<form method="post" enctype="multipart/form-data">
<input type="file" name="image" name="tmp_name" />
            <br/><br/>
            <input type="submit" name="sumit" value="Upload" />
</form>

    </body>
	</html>