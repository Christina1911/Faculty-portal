<?php
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "adminpanel";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if($conn)
    {
        //echo "Connection successful";
    }
    else
    {
        echo "Connection failed"."mysqli_connnect_error";
    } 
    error_reporting(0)    ;
    $day=$_POST['day'];
    $time=$_POST['times'];
    $sub=$_POST['subj'];


    $query= "INSERT INTO routine VALUES ('$day','$time','$sub')";
    $result = mysqli_query($conn,$query);
    if ($result) {
        //echo "Data added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    $quy = "SELECT subject FROM routine WHERE day = '$day' AND time = '$time'";
    $relt = mysqli_query($conn, $quy);
?>


<!DOCTYPE html>

<html>
    <head>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <meta charset="utf-8">
        <title>Dashboard</title>
        <meta name="description" content="">
        <link rel="stylesheet" href="./css files/style(h).css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/jpg" href="./images/logo (1).jpg" />
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
           <!-- sidebar menu start -->
     <div class="sidebar">
        <div class="logo">
        <img class="logo-img" src="./images/logo.jpg" width="100" height="100" >
        </div>
          <ul class="menu" >
            <li class="active">
                <a href="dashboard.php"> <!-- home tab -->
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
            <li>
                <a href="L2.php"> <!-- leaves tab -->
                    <i class="fa fa-calendar-o"></i>
                    <span>Leaves</span>
                </a>
            </li>
            <li>
                <a href="./ps22.html"><!-- payslip tab -->
                    <i class="fa fa-money"></i>
                    <span>Salary Slip</span>
                </a>
            </li>
            <li>
                <a href="log.php"> <!--logout-->
                    <i class="fa fa-sign-out"></i>
                    <span>Logout</span>
                </a>
            </li>
          </ul>
        </div>
        <!-- sidebar menu end -->
        <!-- main content start -->
        <div class="main--content">
            <!-- page header start -->
            <div class="header--wrapper">
                <div class="header--title">
                   <span><h2>Home</h2></span>
                </div>
                <div class="user--info">
                    <img src="./images/bell.png"  /> 
                </div>
            </div>
            <!-- page header end -->
            <!--cards conatiner start -->
            <div class="card--container">

               <div class="card--wrapper">
                 <!-- notices card -->
                  <div class="notices--card" onclick="showPopupNotification()">
                      <i class="fa fa-bell-o"></i>
                       <h3 class="main--title"> Notices</h3>
                  </div>
                  <!-- notices popup -->
                 <div class="notice-popup" id="popup-notification1">
                    
                 <div class="popup-header">
                    <h3>  Recent Notices </h3><button onclick="hidePopupNotification()"> X</button>
                
                 </div> <hr>
                      <div class="content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.

                      </div>
                </div>       
                <script>
                    function showPopupNotification() {
                      var popupNotification = document.getElementById('popup-notification1');
                      popupNotification.style.display = 'block';
                    }
                  
                    function hidePopupNotification() {
                      var popupNotification = document.getElementById('popup-notification1');
                      popupNotification.style.display = 'none';
                    }
                  </script>
                  
                
<!-- Events Card -->
<div class="events--card" onclick="showPopupEvent()">
    <i class="fa fa-calendar-check-o"></i>
    <h3 class="main--title">Events</h3>
</div>

<!-- Events Popup -->
<div class="event-popup" id="popup-event1">
    <div class="popup-header">
        <h3>Upcoming Events</h3>
        <button onclick="hidePopupEvent()"> X </button>
    </div>
    <hr>
    <div class="content">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    </div>
</div>

<script>
    function showPopupEvent() {
        var popupEvent = document.getElementById('popup-event1');
        popupEvent.style.display = 'block';
    }

    function hidePopupEvent() {
        var popupEvent = document.getElementById('popup-event1');
        popupEvent.style.display = 'none';
    }
</script>

                <!-- Attendance Card -->
<div class="attend--card" onclick="showPopupAttendance()">
    <i class="fa fa-calendar"></i>
    <h3 class="main--title">Attendance</h3>
</div>

<!-- Attendance Popup -->
<div class="attendance-popup" id="popup-attendance1">
    <div class="popup-header">
        <h3>Attendance Details</h3>
        <button onclick="hidePopupAttendance()"> X </button>
    </div>
    <hr>
    <div class="content">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    </div>
</div>

<script>
    function showPopupAttendance() {
        var popupAttendance = document.getElementById('popup-attendance1');
        popupAttendance.style.display = 'block';
    }

    function hidePopupAttendance() {
        var popupAttendance = document.getElementById('popup-attendance1');
        popupAttendance.style.display = 'none';
    }
</script>

                <!-- Exams Card -->
<div class="exam--card" onclick="showPopupExams()">
    <i class="fa fa-pencil"></i>
    <h3 class="main--title">Exams</h3>
</div>

<!-- Exams Popup -->
<div class="exams-popup" id="popup-exams1">
    <div class="popup-header">
        <h3>Exam Information</h3>
        <button onclick="hidePopupExams()"> X </button>
    </div>
    <hr>
    <div class="content">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    </div>
</div>

<script>
    function showPopupExams() {
        var popupExams = document.getElementById('popup-exams1');
        popupExams.style.display = 'block';
    }

    function hidePopupExams() {
        var popupExams = document.getElementById('popup-exams1');
        popupExams.style.display = 'none';
    }
</script>

             </div>   
            </div>
            <!-- card container end -->
            <!-- schedule container -->
            <div class="schedule--container">
                <!-- schedule wrapper -->
                <div class="schedule--wrapper">
                   <!-- calendar card -->
                   <div class="cal--card">


  




              <div class="cal--title">
                  <span><h3>Calendar</h3></span>
                
              </div>
              
           
          <div class="row">
              <div class="col-md-12">
                  <div class="elegant-calencar d-md-flex">
                      <div class="wrap-header d-flex align-items-center img" style="background-image: url(images/bg.jpg);">
                    <p id="reset">Today</p>
                  <div id="header" class="p-0">
                              <!-- <div class="pre-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-left"></i></div> -->
                  <div class="head-info">
                      <div class="head-month"></div>
                      <div class="head-day"></div>
                  </div>
                  <!-- <div class="next-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></div> -->
                  </div>
                </div>
                <div class="calendar-wrap">
                    <div class="w-100 button-wrap">
                        <div class="pre-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-left"></i></div>
                        <div class="next-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></div>
                    </div>
                  <table id="calendar" class="calendar-table">
                  <thead>
                      <tr>
                      <th>Sun</th>
                      <th>Mon</th>
                      <th>Tue</th>
                      <th>Wed</th>
                      <th>Thu</th>
                      <th>Fri</th>
                      <th>Sat</th>
                      </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  </tbody>
                  </table>
                </div>
                </div>
              </div>
              </div>
          </div>
          
          
          

      
  

  <script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>





                 
                 <!-- calendar card end -->
                 <!-- time table card -->
                 <div class="tt--card" >
                    <div class="tt--title">
                        <span><h3>Time-Table</h3></span>
                      
                    </div>
                    

                 

                 <div class="timetable-container">
                    <div class="timetable-item" id="0-1">Time</div>
                    <div class="timetable-item" id="0-2">Monday</div>
                    <div class="timetable-item" id="0-3">Tuesday</div>
                    <div class="timetable-item" id="0-4">Wednesday</div>
                    <div class="timetable-item" id="0-5">Thursday</div>
                    <div class="timetable-item" id="0-6">Friday</div>
                    <div class="timetable-item" id="0-7">Saturday</div>
                    
                    <!-- Add your timetable details here -->
                    <div class="timetable-item" id="1-1">8:45 am</div>
                    <div class="timetable-item" id="1-2"></div>
                    <div class="timetable-item" id="1-3"></div>
                    <div class="timetable-item" id="1-4"></div>
                    <div class="timetable-item" id="1-5"></div>
                    <div class="timetable-item" id="1-6"></div>
                    <div class="timetable-item" id="1-7"></div>
                    
                    <div class="timetable-item" id="2-1">9:45 am</div>
                    <div class="timetable-item" id="2-2"></div>
                    <div class="timetable-item" id="2-3"></div>
                    <div class="timetable-item" id="2-4"></div>
                    <div class="timetable-item" id="2-5"></div>
                    <div class="timetable-item" id="2-6"></div>
                    <div class="timetable-item" id="2-7"></div>
                    
                    <div class="timetable-item" id="3-1">10:45 am</div>
                    <div class="timetable-item" style="grid-column: span 6;" id="3-2">short break</div>
                    
                    <div class="timetable-item" id="4-1" style="grid-column: 1;">11:00 am</div>
                    <div class="timetable-item" id="4-2" style="grid-column: 2;"></div>
                    <div class="timetable-item" id="4-3"style="grid-column: 3;"></div>
                    <div class="timetable-item" id="4-4"style="grid-column: 4;"></div>
                    <div class="timetable-item" id="4-5"style="grid-column: 5;"></div>
                    <div class="timetable-item" id="4-6"style="grid-column: 6;"></div>
                    <div class="timetable-item" id="4-7"style="grid-column: 7;"></div>
                    
                    <div class="timetable-item" id="5-1" style="grid-column: 1;">12:00 pm</div>
                    <div class="timetable-item" id="5-2"style="grid-column: 2;"></div>
                    <div class="timetable-item" id="5-3"style="grid-column: 3;"></div>
                    <div class="timetable-item" id="5-4"style="grid-column: 4;"></div>
                    <div class="timetable-item" id="5-5"style="grid-column: 5;"></div>
                    <div class="timetable-item" id="5-6"style="grid-column: 6;"></div>
                    <div class="timetable-item" id="5-7"style="grid-column: 7;"></div>
                    
                    <div class="timetable-item" id="6-1" style="grid-column: 1;">1:00 pm</div>
                    <div class="timetable-item" style="grid-column: span 6;" id="6-2">lunch break</div>
                    
                    <div class="timetable-item" id="7-1" style="grid-column: 1;">1:30 pm</div>
                    <div class="timetable-item" id="7-2"style="grid-column: 2;"></div>
                    <div class="timetable-item" id="7-3"style="grid-column: 3;"></div>
                    <div class="timetable-item" id="7-4"style="grid-column: 4;"></div>
                    <div class="timetable-item" id="7-5"style="grid-column: 5;"></div>
                    <div class="timetable-item" id="7-6"style="grid-column: 6;"></div>
                    <div class="timetable-item" id="7-7"style="grid-column: 7;"></div>
                    
                    <div class="timetable-item" id="8-1" style="grid-column: 1;">2:30 pm</div>
                    <div class="timetable-item" id="8-2"style="grid-column: 2;"></div>
                    <div class="timetable-item" id="8-3"style="grid-column: 3;"></div>
                    <div class="timetable-item" id="8-4"style="grid-column: 4;"></div>
                    <div class="timetable-item" id="8-5"style="grid-column: 5;"></div>
                    <div class="timetable-item" id="8-6"style="grid-column: 6;"></div>
                    <div class="timetable-item" id="8-7"style="grid-column: 7;"></div>
                    
                    <div class="timetable-item" id="9-1" style="grid-column: 1;">3:30 pm</div>
                    <div class="timetable-item" id="9-2"style="grid-column: 2;"></div>
                    <div class="timetable-item" id="9-3"style="grid-column: 3;"></div>
                    <div class="timetable-item" id="9-4"style="grid-column: 4;"></div>
                    <div class="timetable-item" id="9-5"style="grid-column: 5;"></div>
                    <div class="timetable-item" id="9-6"style="grid-column: 6;"></div>
                    <div class="timetable-item" id="9-7"style="grid-column: 7;"></div>
                    
                    <!-- Add more rows as needed -->
                   
            <!-- Form for user input -->
            <form method="POST">
                <label for="day">Select Day:</label>
                <select id="day" name="day">
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                </select>
            
                <label for="time">Select Time:</label>
                <select id="time" name="times">
                <option value="8:45">8:45 am</option>
                <option value="9:45">9:45 am</option>
                <option value="11:00">11:00 am</option>
                <option value="12:00">12:00 pm</option>
                <option value="1:30">1:30 pm</option>
                <option value="2:30">2:30 pm</option>
                <option value="3:30">3:30 pm</option>
                </select>
            
            <label for="subject">Enter Subject:</label>
            <input type="text" id="subject" name="subj">
            
            <button type="submit" name="sub" class="add-data-button" onclick="addData()">Add Data</button>
            </form >
            
            <script>
                /*function addData() {
                    // Get user input values
                    var day = document.getElementById("day").value;
                    var rawTime = document.getElementById("time").value;
                    var subject = document.getElementById("subject").value;
                
                    // Find the corresponding cell and update its content
                    var columnIndex = getDayIndex(day) + 1; // Adjusted by 1 to match grid column index
                    var timeSlotIndex = getTimeSlotIndex(rawTime) + 1; // Adjusted by 1 to match grid row index
                    var cellId = findCellId(columnIndex, timeSlotIndex);
                    var targetCell = document.getElementById(cellId);
                
                    if (targetCell) {
                        targetCell.innerHTML = subject;
                    } else {
                        // If the specified cell ID is not found, show an alert
                        alert("Invalid day or time selection.");
                    }
                }*/
                
    function addData() {
        var day = document.getElementById("day").value;
        var rawTime = document.getElementById("time").value;

        var columnIndex = getDayIndex(day) + 1;
        var timeSlotIndex = getTimeSlotIndex(rawTime) + 1;
        var cellId = findCellId(columnIndex, timeSlotIndex);
        var targetCell = document.getElementById(cellId);

        // Make an AJAX request to fetch the subject
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "fetchSubject.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var subject = xhr.responseText;
                if (targetCell) {
                    targetCell.innerHTML = subject;
                } else {
                    alert("Invalid day or time selection.");
                }
            }
        };

        // Send the request with the selected day and time
        xhr.send("day=" + day + "&time=" + rawTime);
    }

    function findCellId(columnIndex, timeSlotIndex) {
        return timeSlotIndex + '-' + columnIndex; // Adjusted to match the order of row and column indices
    }

    // Function to get the index of the day in the timetable grid
    function getDayIndex(day) {
        switch (day) {
            case "Monday":
                return 1; // Adjusted to 1 for Monday
            case "Tuesday":
                return 2;
            case "Wednesday":
                return 3;
            case "Thursday":
                return 4;
            case "Friday":
                return 5;
            case "Saturday":
                return 6;
            default:
                return -1;
        }
    }

    function getTimeSlotIndex(rawTime) {

        switch (rawTime) {
            case "8:45":
                return 0; // 8:45 am row
            case "9:45":
                return 1; // 9:45 am row
            case "11:00":
                return 3; // 11:00 am row
            case "12:00":
                return 4; // 12:00 pm row
            case "1:30":
                return 6; // 1:30 pm row
            case "2:30":
                return 7; // 2:30 pm row
            case "3:30":
                return 8; // 3:30 pm row
            default:
                return -1; // Invalid time slot
        }
    }

                </script><!-- timetable conatiner end--> 
</div>
</div>
<!-- Form for user input -->
 
              </div>  
                    
                
    
                     
                    
                  <!--schedule wrapper end -->
            </div>
              <!--schedule container -->
              
                
                    
                
        </div><!--main content end -->
            
        
    </body>
</html>