<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email address from the form
    $email = $_POST['email'];

    // Validate the email address (you can add more validation if needed)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Invalid email address
        echo "Invalid email address";
        exit;
    }

    // Your code to query the database and retrieve the user's details goes here
    // For example, you might have a database table named "users" with columns "id", "email", etc.
    // Replace this with your actual database query
    $connection = mysqli_connect("localhost", "username", "password", "database");
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $query);

    // Check if the email address exists in the database
    if (mysqli_num_rows($result) > 0) {
        // Fetch user details
        $user = mysqli_fetch_assoc($result);

        // Generate a unique token for password reset (you can use a better method for generating tokens)
        $token = bin2hex(random_bytes(32));

        // Update the user's record in the database with the token
        // This is just an example, you should implement proper database update logic
        $updateQuery = "UPDATE users SET reset_token = '$token' WHERE email = '$email'";
        mysqli_query($connection, $updateQuery);

        // Send the password reset link to the user's email address
        $resetLink = "http://example.com/reset_password.php?token=$token"; // Replace with your reset password page URL
        $subject = "Password Reset Request";
        $message = "Hello " . $user['username'] . ",\n\n";
        $message .= "Please click the following link to reset your password:\n";
        $message .= $resetLink;
        $headers = "From: your@example.com"; // Replace with your email address

        // Send the email
        if (mail($email, $subject, $message, $headers)) {
            echo "Password reset link has been sent to your email address.";
        } else {
            echo "Failed to send password reset link. Please try again later.";
        }
    } else {
        // Email address not found in the database
        echo "Email address not found.";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>forgot password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="./css files/style(l).css">
</head>
<body>
    <div class="form-gap"></div>
<div class="container">
	<div class="row">
		
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post" action="">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                        </div>
</div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                      </div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>

</body>
</html>