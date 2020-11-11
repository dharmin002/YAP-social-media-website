<?php
session_start();
include_once 'dbconnect.php';
            
                echo "photo in progress";
				if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
                {
                    echo "Ni aaya";
                }
                else
                {
                    $image= addslashes($_FILES['image']['tmp_name']);
                    $name= addslashes($_FILES['image']['name']);
                    $image= file_get_contents($image);
                    $image= base64_encode($image);
                    saveimage($name,$image);
                }
            
			function saveimage($name,$image)
            {
                
				$userid = $_SESSION['user_id'];
                $frndid = $_SESSION['chat'];
				
                $res1=mysql_query("SELECT * FROM users WHERE user_id='$userid'");
                $userRow1=mysql_fetch_array($res1);
                $res2=mysql_query("SELECT * FROM users WHERE user_id='$frndid'");
                $userRow2=mysql_fetch_array($res2);

                $uname = $userRow1['username'];
				$msg="*img*";
				mysql_query("INSERT INTO logs(`username`, `msg`,fromid ,toid ,iname ,image) VALUES('$uname', '$msg' ,'$userid', '$frndid', '$name', '$image')");
                
            }