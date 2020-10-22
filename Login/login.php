<?php
   include 'db.php';
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $email = mysqli_real_escape_string($db,$_POST['email']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 
      $sql = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
      $result = mysqli_query($db, $sql) or die( mysqli_error($db));
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      //$active = $row['active'];
      $count = mysqli_num_rows($result);      

      if($count == 1) {
         $_SESSION['email'] = "$email";
         
         header("location: welcome.php");
      }else {
         $error = "Váš email nebo heslo nebylo zadáno správně!";
      }
   }
?>
<html>
   
   <head>
      <title>Login</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>E-Mail  :</label><input type = "email" name = "email" class = "box"/><br /><br />
                  <label>heslo  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color: red; margin-top:10px">
               </div>
					
            </div>
				
         </div>
			
      </div>

   </body>