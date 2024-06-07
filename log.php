<?php

session_start();


$server_name = "localhost";
$user_name = "root";
$pass="1234";
$database_name = "adminpanel";


$connection = mysqli_connect($server_name,$user_name,$pass,$database_name);

if(!$connection){
    die("Page Falied".mysqli_connect_error());
}

if(isset($_POST['sub'])){
	$username = $_POST["username"];
    $password = $_POST["password"];

    // Protect against SQL injection
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

	$query = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";

	$result = mysqli_query($connection,$query);
	if (mysqli_num_rows($result) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: dashboard.php');
      session_start();
  	}else {
        $msg = "Invalid Credentials";
        echo "<script>alert('$msg');</script>";
  	}
    session_destroy() ;
    
}
?>
<!DOCTYPE html>
<html lang ="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Expires" content="0">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0"> 
        <title>Login form</title>
        <link rel="stylesheet" href="./css files/style(l).css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        </head>
        <body>
            <div class ="wrapper">
                <form method="POST">
                    <h1>LOGIN</h1>
                    <div class="input-box">
                        <input type="text" placeholder="Username" name="username" required> 
                        
                        
                        </div>
                        <div class="input-box">
                            <input type="password" placeholder="Password" name="password" required>
                            
                            
                            
                            </div>
                            <div class="remember-forgot">
                                <a href="forgot password 2.php">Forgot password?</a>
                            </div>
                        
                            
                           
                            <button type="submit" class="btn" name = "sub">Login</button>
                        </form>
                        </div>

                   
                        </body>
                        </html>
