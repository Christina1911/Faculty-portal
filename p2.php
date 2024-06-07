<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "adminpanel";
$con = mysqli_connect($servername, $username, $password, $dbname);
if($con)
{
//echo "Connection successful";
}
else
{
echo "Connection failed"."mysqli_connnect_error";
} 



$profileupdate = false;
if (isset($_POST["eID"], $_POST["fname"], $_POST["lname"], $_POST["desg"], $_POST["add"], $_POST["email"], $_POST["phn"], $_POST["bday"])) {
    // Your form processing code here

    $EID = mysqli_real_escape_string($con, $_POST["eID"]);
    $fname = mysqli_real_escape_string($con, $_POST["fname"]);
    $lname = mysqli_real_escape_string($con, $_POST["lname"]);
    $desg = mysqli_real_escape_string($con, $_POST["desg"]);
    $add = mysqli_real_escape_string($con, $_POST["add"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $phn = mysqli_real_escape_string($con, $_POST["phn"]);
    $bday = mysqli_real_escape_string($con, $_POST["bday"]);
    $query = "INSERT INTO ptab  VALUES('$EID', '$fname', '$lname' , '$desg','$add','$email' , '$phn' , '$bday')";
    $p= mysqli_query($con, $query);

    $_SESSION['Profile_Updated'] = true; // Update session data
}

    $profileupdate = true;
    $imn = "SELECT Eid FROM ptab";
    $result = mysqli_query($con, $imn);
    $row = mysqli_fetch_assoc($result);
    
    $im = "SELECT fname FROM ptab";
    $resut = mysqli_query($con, $im);
    $rw = mysqli_fetch_assoc($resut);

    $imln = "SELECT lame FROM ptab";
    $resutln = mysqli_query($con, $imln);
    $rwln = mysqli_fetch_assoc($resutln);

    $imd= "SELECT designation FROM ptab";
    $resutd = mysqli_query($con, $imd);
    $rwd = mysqli_fetch_assoc($resutd);

    $ima= "SELECT address FROM ptab";
    $resuta = mysqli_query($con, $ima);
    $rwa = mysqli_fetch_assoc($resuta);

    $ime= "SELECT email FROM ptab";
    $resute = mysqli_query($con, $ime);
    $rwe = mysqli_fetch_assoc($resute);
    
    $imph= "SELECT phone FROM ptab";
    $resutph = mysqli_query($con, $imph);
    $rwph = mysqli_fetch_assoc($resutph);

    $imbd= "SELECT bday FROM ptab";
    $resutbd = mysqli_query($con, $imbd);
    $rwbd = mysqli_fetch_assoc($resutbd);






?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<title>Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./css files/style(h).css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="icon" type="image/jpg" href="./images/logo (1).jpg" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">

    	body{
background-color:#f2f6fc;
color:#69707a;
}
.img-account-profile {
    height: 10rem;
}
.rounded-circle {
    border-radius: 50% !important;
}
.card {
    box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
}
.card .card-header {
    font-weight: 500;
}
.card-header:first-child {
    border-radius: 0.35rem 0.35rem 0 0;
}
.card-header {
    padding: 1rem 1.35rem;
    margin-bottom: 0;
    background-color: rgba(33, 40, 50, 0.03);
    border-bottom: 1px solid rgba(33, 40, 50, 0.125);
}
.form-control, .dataTable-input {
    display: block;
    width: 100%;
    padding: 0.875rem 1.125rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1;
    color: #69707a;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #c5ccd6;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.35rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.nav-borders .nav-link.active {
    color: #0061f2;
    border-bottom-color: #0061f2;
}
.nav-borders .nav-link {
    color: #69707a;
    border-bottom-width: 0.125rem;
    border-bottom-style: solid;
    border-bottom-color: transparent;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    padding-left: 0;
    padding-right: 0;
    margin-left: 1rem;
    margin-right: 1rem;
}
 /* Some basic styling for demonstration */
 .container {
    text-align: center;
    margin-top: 50px;
  }
  .button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
    </style>
</head>
<body>

<!-- sidebar menu start -->
<div class="sidebar">
            <div class="logo">
             <img class="logo-img" src="./images/logo.jpg" width="100" height="100" >
            </div>
            
            <ul class="menu" >
                <li>
                    <a href="dashboard.php"> <!-- dashboard tab -->
                        <i class="fa fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="p2.php">
                    <a href="pr"><!--profile tab -->
                        <i class="fa fa-user-circle-o"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="L2.php"> <!--leaves tab -->
                        <i class="fa fa-calendar-o"></i>
                        <span>Leaves</span>
                    </a>
                </li>
                
                <li>
                    <a href="ps22.html"> <!--payslip tab -->
                        <i class="fa fa-money"></i>
                        <span>Salary Slip</span>
                    </a>
                </li>
                <li>
                    <a href="log.php"> <!-- logout -->
                        <i class="fa fa-sign-out"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
       </div>
	<!--main content start -->
        <div class="main--content">
		<!--page header -->
            <div class="header--wrapper">
                <div class="header--title">
                    <span><h2>Profile</h2></span>
                 </div>
                <div class="user--info">
                        <img src="./images/user.png"  /> 
                </div>
                
            </div>
		<!-- page heaader end -->

<!-- profile photo section -->
<hr class="mt-0 mb-4">
<div class="row">
    <div class="col-xl-4">
        <div class="card mb-5 mb-xl-0">
            <div class="card-header">Profile Picture</div>
            <div class="card-body text-center">
                <img class="img-account-profile rounded-circle mb-2" src="./images/user.png" alt>
                <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-primary" type="button">Upload new image</button>
                    <div style="margin-left: 10px;"> <!-- Added a margin for spacing -->
                        <a href="change.php"><button class="btn btn-primary" type="button">Change Password</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!--end profile photo section -->
<!-- Account details section-->

<div class="col-xl-8">

<div class="card mb-4">
<div class="card-header">Account Details</div>
<div class="card-body">
<form action="p2.php" method="POST">
<!--username -->
<div class="mb-3">
<label class="small mb-1" for="inputUsername">Employee ID</label>
<input class="form-control" id="inputUsername" type="text" value="<?php echo $row['Eid'];?>" name="eID">

</div>
<!--full name -->
<div class="row gx-3 mb-3">
<!-- first name -->
<div class="col-md-6">
<label class="small mb-1" for="inputFirstName">First name</label>
<input class="form-control" id="inputFirstName" type="text" value="<?php echo $rw['fname'];?>"name="fname" >
</div>
<!-- last name -->
<div class="col-md-6">
<label class="small mb-1" for="inputLastName">Last name</label>
<input class="form-control" id="inputLastName" type="text" value="<?php echo $rwln['lame'];?>"name="lname">
</div>
</div>

<div class="row gx-3 mb-3">
<!-- designation -->
<div class="col-md-6">
<label class="small mb-1" for="inputOrgName">Designation</label>
<input class="form-control" id="inputOrgName" type="text" value="<?php echo $rwd['designation'];?>" name="desg">
</div>
<!-- address-->
<div class="col-md-6">
<label class="small mb-1" for="inputLocation">Address</label>
<input class="form-control" id="inputLocation" type="text" value="<?php echo $rwa['address'];?>" name="add">
</div>
</div>
<!-- Email ID-->
<div class="mb-3">
<label class="small mb-1" for="inputEmailAddress">Email address</label>
<input class="form-control" id="inputEmailAddress" type="email" value="<?php echo $rwe['email']?>" name="email" >
</div>
<!-- phone no. -->
<div class="row gx-3 mb-3">

<div class="col-md-6">
<label class="small mb-1" for="inputPhone">Phone number</label>
<input class="form-control" id="inputPhone" type="tel" value="<?php echo $rwph['phone'];?>" name="phn" >
</div>
<!-- birthday -->
<div class="col-md-6">
<label class="small mb-1" for="inputBirthday">Birthday</label>
<input class="form-control" id="inputBirthday" type="date"  value="<?php  echo $rwbd['bday'];?>" name="bday" >
</div>
</div>
<!-- submit changes -->
<button class="btn btn-primary" type="submit" name="sub">Save changes</button>
</form>
<!-- end of form -->
</div>
</div>
</div>
</div>
</div>
</div>

<!--java script-->
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">

	
</script>
</body>
</html>