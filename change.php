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
if (isset($_POST['submit'])) {
  $username = $_POST["employee_id"];
  $password = $_POST["password"];
  $newPassword = $_POST["newPassword"];
  $confirmPassword = $_POST["confirmPassword"];

  // Protect against SQL injection
  $username = mysqli_real_escape_string($connection, $username);
  $password = mysqli_real_escape_string($connection, $password);
  $newPassword = mysqli_real_escape_string($connection, $newPassword);
  $confirmPassword = mysqli_real_escape_string($connection, $confirmPassword);

  // Check if the username and password match in the database
  $query = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($connection, $query);

  if ($result && mysqli_num_rows($result) == 1) {
      // Username and password match, proceed to update password
      if ($newPassword == $confirmPassword) {
          // Update the password in the database
          $updateQuery = "UPDATE login SET password = '$newPassword' WHERE username = '$username'";
          $updateResult = mysqli_query($connection, $updateQuery);

          if ($updateResult) {
              echo "Password updated successfully!";
              header('location: log.php');
          } else {
              echo "Error updating password: " . mysqli_error($connection);
          }
      } else {
          echo "New passwords do not match.";
      }
  } else {
      echo "Invalid username or password.";
  }
}





?>
<html lang ="en">
      <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0"> 
        <title>Change Password</title>
        <link rel="stylesheet" href="./css files/style(l).css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <style>_id
            .mainDiv {
    display: flex;
    min-height: 100%;
    align-items: center;
    justify-content: center;
    
    font-family: 'Open Sans', sans-serif;
  }
 .cardStyle {
    width: 500px;
    border-color: white;
    background: #D3D3D3;
    padding: 36px 0;
    border-radius: 4px;
    margin: 30px 0;
    box-shadow: 0px 0 2px 0 rgba(0,0,0,0.25);
  }
#signupLogo {
  max-height: 100px;
  margin: auto;
  display: flex;
  flex-direction: column;
}
.formTitle{
  font-weight: 600;
  margin-top: 20px;
  color: #2F2D3B;
  text-align: center;
}
.inputLabel {
  font-size: 12px;
  color: #555;
  margin-bottom: 6px;
  margin-top: 24px;
}
  .inputDiv {
    width: 70%;
    display: flex;
    flex-direction: column;
    margin: auto;
  }
  nput {
  height: 40px;
  font-size: 16px;
  border-radius: 4px;
  border: none;
  border: solid 1px #ccc;
  padding: 0 11px;
}
input:disabled {
  cursor: not-allowed;
  border: solid 1px #eee;
}
.buttonWrapper {
  margin-top: 40px;
}
  .submitButton {
    width: 70%;
    height: 40px;
    margin: auto;
    display: block;
    color: #fff;
    background-color: #065492;
    border-color: #065492;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.12);
    box-shadow: 0 2px 0 rgba(0, 0, 0, 0.035);
    border-radius: 4px;
    font-size: 14px;
    cursor: pointer;
  }
.submitButton:disabled,
button[disabled] {
  border: 1px solid #cccccc;
  background-color: #cccccc;
  color: #666666;
}

#loader {
  position: absolute;
  z-index: 1;
  margin: -2px 0 0 10px;
  border: 4px solid #f3f3f3;
  border-radius: 50%;
  border-top: 4px solid #666666;
  width: 14px;
  height: 14px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg);}
}
        </style>
        </head>
        <body>
            <div class="mainDiv">
                <div class="cardStyle">
                  <form method="post" >
                    
                    <img src="" id="signupLogo"/>
                    
                    <h2 class="formTitle">
                      CHANGE PASSWORD
                    </h2>
                    <div class="inputDiv">
                        <label class="inputLabel" for="emplyee_id">Employee Id</label>
                        <input type="text" id="employee_id" name="employee_id" required>
                      </div> 

                  <div class="inputDiv">
                    <label class="inputLabel" for="password">Current Password</label>
                    <input type="password" id="password" name="password" required>
                  </div>
                  <div class="inputDiv">
                    <label class="inputLabel" for="password">New Password</label>
                    <input type="password" id="password" name="newPassword" required>
                  </div>
                    
                  <div class="inputDiv">
                    <label class="inputLabel" for="confirmPassword">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword">
                  </div>
                  
                  <div class="buttonWrapper">
                    <button type="submit" id="submitButton" name="submit" onclick="validateSignupForm()" class="submitButton pure-button pure-button-primary">
                      <span>SUBMIT</span>
                      <span id="loader"></span>
                    </button>
                  </div>
                    
                </form>
                </div>
              </div>
              <script>
                var newPassword = document.getElementById("newPassword")
  , confirm_password = document.getElementById("confirmPassword");

document.getElementById('signupLogo').src = "https://s3-us-west-2.amazonaws.com/shipsy-public-assets/shipsy/SHIPSY_LOGO_BIRD_BLUE.png";
enableSubmitButton();

function validatePassword() {
  if(newPassword.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
    return false;
  } else {
    confirm_password.setCustomValidity('');
    return true;
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

function enableSubmitButton() {
  document.getElementById('submitButton').disabled = false;
  document.getElementById('loader').style.display = 'none';
}

function disableSubmitButton() {
  document.getElementById('submitButton').disabled = true;
  document.getElementById('loader').style.display = 'unset';
}

function validateSignupForm() {
  var form = document.getElementById('signupForm');
  
  for(var i=0; i < form.elements.length; i++){
      if(form.elements[i].value === '' && form.elements[i].hasAttribute('required')){
        console.log('There are some required fields!');
        return false;
      }
    }
  
  if (!validatePassword()) {
    return false;
  }
  onSignup();
}

function onSignup() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    
    disableSubmitButton();
    
    if (this.readyState == 4 && this.status == 200) {
      enableSubmitButton();
    }
    else {
      console.log('AJAX call failed!');
      setTimeout(function(){
        enableSubmitButton();
      }, 1000);
    }
    
  };
  
  xhttp.open("GET", "ajax_info.txt", true);
  xhttp.send();
}
              </script>
            </body>
            </html>