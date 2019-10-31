<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT uid FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['uid'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: search.php");
      }else {
        echo '<script type="text/javascript">';
        echo ' alert("Username or Password is incorrect. ")';  //not showing an alert box.
        echo '</script>';
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="main.css">
    <style type = "text/css">
    body {
        background-color: #4db8ff;
        font-family: 'Ubuntu', sans-serif;
        overflow: hidden;
        position: relative;
    }
    
    .loginbod {
        background-color: #FFFFFF;
        width: 400px;
        height: 400px;
        margin: 7em auto;
        border-radius: 128px;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
        z-index: 20;
        position: relative;
    }
    
    .loginh {
        padding-top: 40px;
        color: #4db8ff;
        font-family: 'Ubuntu', sans-serif;
        font-weight: bold;
        font-size: 23px;
    }
    
    .username {
    width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 10px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
    
    form {
        padding-top: 40px;
    }
    
    .password {
    width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 10px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
    
   
    .username:focus, .password:focus {
        border: 2px solid rgba(0, 0, 0, 0.18) !important;
        
    }
    
    .submit {
      cursor: pointer;
        border-radius: 5em;
        color: black;
        background: #80ccff;
        border: 0;
        padding-left: 40px;
        padding-right: 40px;
        padding-bottom: 10px;
        padding-top: 10px;
        font-family: 'Ubuntu', sans-serif;
        margin-left: 10px;
        font-size: 13px;
        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
        text-align: center;
    }
    
    .submit {
        color: black;
        text-decoration: none;
        text-align: center;
    }
    
    @media (max-width: 600px) {
        .main {
            border-radius: 0px;
        }
    </style>
   </head>
   
   <body bgcolor = "#4db8ff">
	
      <div align = "center" class="loginbod">
            <p class="loginh" align="center">Login</p>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <input placeholder="Username" class="username" type = "text" name = "username"/><br />
                  <input placeholder="Password" class="password" type = "password" name = "password"/><br />
                  <input class="submit" type = "submit" value = "Submit"/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>
					
            </div>
				
         </div>
			
      </div>
      <div class="paw">
      <div class="paw-print-1">
    <div class="pad large"></div>
    <div class="pad small-1"></div>
    <div class="pad small-2"></div>
    <div class="pad small-3"></div>
    <div class="pad small-4"></div>
</div>
    
<div class="paw-print-2">
    <div class="pad large"></div>
    <div class="pad small-1"></div>
    <div class="pad small-2"></div>
    <div class="pad small-3"></div>
    <div class="pad small-4"></div>
</div>    
    
<div class="paw-print-3">
    <div class="pad large"></div>
    <div class="pad small-1"></div>
    <div class="pad small-2"></div>
    <div class="pad small-3"></div>
    <div class="pad small-4"></div>
</div>    
    
<div class="paw-print-4">
    <div class="pad large"></div>
    <div class="pad small-1"></div>
    <div class="pad small-2"></div>
    <div class="pad small-3"></div>
    <div class="pad small-4"></div>
</div>
    
<div class="paw-print-5">
    <div class="pad large"></div>
    <div class="pad small-1"></div>
    <div class="pad small-2"></div>
    <div class="pad small-3"></div>
    <div class="pad small-4"></div>
</div>
    
<div class="paw-print-6">
    <div class="pad large"></div>
    <div class="pad small-1"></div>
    <div class="pad small-2"></div>
    <div class="pad small-3"></div>
    <div class="pad small-4"></div>
</div>
    
<div class="paw-print-7">
    <div class="pad large"></div>
    <div class="pad small-1"></div>
    <div class="pad small-2"></div>
    <div class="pad small-3"></div>
    <div class="pad small-4"></div>
</div>

<div class="paw-print-8">
    <div class="pad large"></div>
    <div class="pad small-1"></div>
    <div class="pad small-2"></div>
    <div class="pad small-3"></div>
    <div class="pad small-4"></div>
</div>
</div>
    <script  src="index.js"></script>
   </body>
</html>