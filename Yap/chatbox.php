<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}
$_SESSION['message']=$_POST['msg'];
 //$msg =$_POST['msg'];
 //$_SESSION['msg'] = $msg;
?>

<html>
<head>
<title>Chat Box</title>
<link rel = "stylesheet" type="text/css" href ="chat.css"/>
<script src="http://code.jquery.com/jquery-1.9.0.js"></script>
<script>
function submitChat(){
 if(form1.uname.value == '' || form1.msg.value == '' ){
  alert('ALL FIELDS ARE MANDATORY!!!!');
  return;
 }
 form1.uname.readOnly = true;
 form1.uname.style.border = 'none';
 var uname = form1.uname.value;
 var msg = form1.msg.value;
 var xmlhttp = new XMLHttpRequest();
 
 xmlhttp.onreadystatechange = function(){
 if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
  document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
 
           }
 
 }
 xmlhttp.open('GET','insert.php?uname='+uname+ '&msg='+msg, true);
//header("Location: insert.php");
/*<?php
$_SESSION['message']=$_POST['msg'];

//header("Location: insert.php");
//echo mysql_error();
?>*/
 
 xmlhttp.send();
 
 location.reload();
}
$(document).ready(function(e){
 $.ajaxSetup({cache:false});
 setInterval(function(){$('#chatlogs').load('logs.php');}, 2000);
});

</script>


</head>
<body>
<form name = "form1">


Your Message: <br />
<textarea name= "msg" styles = "width:200px; height: 70px"></textarea><br />
<a href= "#" onclick= "submitChat()"class= "button">Send</a><br /><br />

<div id="chatlogs"> 
LOADING CHATLOGS PLEASE WAIT...
</div>
</body>﻿
