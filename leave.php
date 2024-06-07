<?php
session_start();

$server_name = "localhost";
$user_name = "root";
$pass = "1234";
$database_name = "adminpanel";

$connection = mysqli_connect($server_name, $user_name, $pass, $database_name);

if (!$connection) {
    die("Page Failed" . mysqli_connect_error());
}


if (isset($_POST["sub"])) {
    $name = mysqli_real_escape_string($connection, $_POST["name"]);
    $reason = mysqli_real_escape_string($connection, $_POST["reason"]);
    $eID = mysqli_real_escape_string($connection, $_POST["employee_id"]);
    $remaining = mysqli_real_escape_string($connection, $_POST["remaining"]);
    $sdate = mysqli_real_escape_string($connection, $_POST["sdate"]);
    $edate = mysqli_real_escape_string($connection, $_POST["edate"]);
    
    $query = "INSERT INTO advac VALUES('$name', '$reason', '$eID' , '$remaining','$sdate','$edate')";
    mysqli_query($connection, $query);


    
}
?>




<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Leaves</title>
        <meta name="description" content="">
        <link rel="stylesheet" href="./css files/style(leave).css">
        <link rel="stylesheet" href="./css files/style(h).css">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/jpg" href="./images/logo (1).jpg" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Bootstrap CDN --><link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <!-- Bootstrap Icons CDN -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css"
    />
    <!-- FontAwesome CDN  -->

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>Document</title>
    
    <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Check if leave has been submitted and show alert
                if (<?php echo $leaveSubmitted ? 'true' : 'false'; ?>) {
                    alert("Your leave application has been submitted and is being processed. Kindly wait for a response.");
                    <?php
                    // Reset the session variable to prevent showing the popup on subsequent visits
                    unset($_SESSION['leave_submitted']);
                    ?>
                }
            });
        </script>
    </head>
    <body>
        <!--sidebar menu start -->
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
            <li>
                <a href="p2.php"> <!-- profile tab -->
                    <i class="fa fa-user-circle-o"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li class="active">
                <a href="L2.php"> <!--leaves tab -->
                    <i class="fa fa-calendar-o"></i>
                    <span>Leaves</span>
                </a>
            </li>
           
            <li>
                <a href="ps22.html"> <!-- payslip tab-->
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
        <!--sidebar menu end -->
        <!-- main content start -->
        <div class="main--content">
            <!--page header -->
          <div class="header--wrapper">
              <div class="header--title">
                  <span><h2>Leaves</h2></span>
               </div>
              <div class="user--info">
                      <img src="./images/user.png"  /> 
              </div>
              
          </div>
        <!-- page header end -->
        <!-- form header -->
            <section class="leave-request">
              <header class="text-center mb-5">
                <i
                  class="bi bi-person-fill display-1 text-primary"
                  style="font-size: 10rem"
                ></i>
                <h1 class="display-1 h1">Leave request form</h1>
              </header>
         <!--form header end -->
              <!-- Form -->
      
              <form id="Leave Request Form" method="POST">
                <!-- Name -->
                <div class="row mb-3">
                  <label class="form-label" >Name</label>
                  <div class="col">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Full Name"
                      id="FullName" name = "name"
                    />
                  </div>
                      <!-- reason for leave -->
                <div class="row mb-3">
                  <label class="form-label" >Reason for leave</label>
                  <div class="col">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="specify reason for availing leave"
                      id="Reason" name = "reason"
                    />
                  </div>
                </div>
               
                <!--  Employee ID-->
                <div class="row mb-3">
                  <div class="col">
                    <label class="form-label" >Employee ID</label
                    ><input
                      type="text"
                      class="form-control"
                      id="EmployeeID"
                      placeholder="Your Employee ID" name = "employee_id"
                    />
                  </div>
                      <!-- Remaining vacation days-->
                  <div class="col">
                    <label class="form-label" >Remaining leave days</label
                    ><input
                      type="number"
                      class="form-control"
                      id="RemainingDays"
                      placeholder="Your remaining days of vacation" name="remaining"
                    />
                  </div>
                </div>
                 <!--  start date-->
                <div class="row mb-3">
                  <div class="col">
                    <label class="form-label" 
                      >Start date<small class="text-muted"
                        >(incl. 1st day)</small
                      ></label
                    ><input type="date" class="form-control" id="StartDate" name = "sdate"/>
                  </div>
                     <!-- end date-->
                  <div class="col">
                    <label class="form-label" 
                      >End date
                      <small class="text-muted">(incl. last day)</small></label
                    ><input type="date" class="form-control" id="EndDate" name = "edate" />
                  </div>
                </div>
                 <!-- submit form-->
                <button
                  type="submit"
                  class="btn btn-primary w-100 shadow-sm" name="sub">
                  Submit
                </button>
              </form>
            </section>
          </div>
        </div>
         <!--  End of form-->
          <!-- Create leave request -->
      
         
        <!-- -->
    </body>
</html>
