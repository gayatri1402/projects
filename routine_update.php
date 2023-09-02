<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Department of MCA</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-574-mexant.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">


  </head>

<body>


  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                    
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li class="scroll-to-section"><a href="index.html">Home</a></li>
                          <li class="scroll-to-section"><a href="index.html">Services</a></li>
                          <li class="scroll-to-section"><a href="index.html">About</a></li>
                         
                          <li><a href="contact-us.html">Contact Support</a></li> 
                      </ul>        
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="header-text">
            <h2>Time Table</h2>
            <div class="div-dec"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
include('db_con.php');

if (isset($_POST['submit'])) {
    $r_id = $_REQUEST['id'];
    $week = $_POST['week'];
    $year = $_POST['year'];
    $session = $_POST['session'];
    $time = $_POST['time'];
    $type = $_POST['type'];
    $s_name = $_POST['subject'];
    $t_name = $_POST['teacher'];

    // Corrected SQL query with backticks and comma
    $sql = "UPDATE `routine` SET `week`='$week', `year`='$year', `session`='$session', `time`='$time', `type`='$type', `subject`='$s_name', `teacher`='$t_name' WHERE `r_id`='$r_id'";

    try {
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header('Location: routine_insert.php');
        } else {
            echo "<div class='alert alert-danger'>";
            echo "<strong>Error!</strong> in update. Please try again.";
            echo "</div>";
        }
    } catch (mysqli_sql_exception $e) {
        echo "Caught exception: " . $e->getMessage();
    }
}
?>

<!-- Rest of your HTML code -->

<center><h3>Update Routine</h3></center>
<hr>
<div class="col-sm-10 col-sm-offset-2">

<?php
    $id = $_REQUEST['id'];
    $sql1 = "SELECT * FROM routine WHERE r_id='$id'";
     $result1 = mysqli_query($conn,$sql1);
     while($row = mysqli_fetch_array($result1)){

?>

<form action="routine_update.php" method="post" class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-sm-2 control-label">Week</label>
                <div class="col-sm-7">
                    <select class="form-control" name="week">
                        <option value="Saturday">Saturday</option>
                        <option value="Sunday">Sunday</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Year</label>
                <div class="col-sm-7">
                    <select class="form-control" name="year">
                        <option value="1-1">1-1</option>
                        <option value="1-2">1-1</option>
                        <option value="2-1">2-1</option>
                        <option value="2-2">2-2</option>
                        
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="session" class="col-sm-2 control-label">Session:</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="session" value="<?= $row['session']; ?>" >
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-2 control-label">Type</label>
                <div class="col-sm-7">
                    <select class="form-control" name="type">
                        <option value="Theory">Theory</option>
                        <option value="Lab">Lab</option>
                        <option value="Lab">Lab/Theory</option>

                    </select>
                </div>
            </div>

            <div class="form-group">
    <label for="teacher" class="col-sm-2 control-label"><b><u>Teacher:</u></b></label>
    <div class="col-sm-7">
    <input type="text" class="form-control" name="teacher" placeholder="Enter teacher name">
    </div>
</div>

          
           
<div class="form-group">
    <label class="col-sm-2 control-label"><b><u>Time:</u></b></label>
    <div class="col-sm-7">
    <select class="form-control" name="time">
    <option value=" "> </option>
        <option value="09:45 AM - 10:35 AM">09:45 AM - 10:35 AM</option>
        <option value="10:35 AM - 11:25 AM">10:35 AM - 11:25 AM</option>
        <option value="11:25 AM - 11:40 PM">11:25 AM - 11:40 AM</option>
        <option value="11:40 AM - 12:30 PM">11:40 AM - 12:30 PM</option>
        <option value="12:30 PM - 01:20 PM">12:30 PM - 01:20 PM</option>
        <option value="01:20 PM - 02:15 PM">01:20 PM - 02:15 PM</option>
        <option value="02:15 PM - 03:05 PM">02:15 PM - 03:05 PM</option>
        <option value="03:05 PM - 03:55 PM">03:05 PM - 03:55 PM</option>
        <option value="03:55 PM - 04:45 PM">03:55 PM - 04:45 PM</option>



    </select>
    </div>
</div>




<div class="form-group">
    <label class="col-sm-2 control-label"><b><u>Subject:</u></b></label>
    <div class="col-sm-7">
    <select class="form-control" name="subject">
    <option value=" "> </option>
        <option value="Java Programming">Java Programming</option>
        <option value="Data Structure & Algorithms">Data Structure & Algorithms</option>
        <option value="Object Oriented Software Engineering">Object Oriented Software Engineering</option>
        <option value="Operating System Concepts">Operating System Concepts</option>
        <option value="Network Technologies">Network Technologies</option>
        <option value="Open Course 1">Open Course 1</option>
        <option value="Open Course 2">Open Course 2</option>
        <option value="Soft Skills">Soft Skills</option>
        <option value="Python Programming">Python Programming</option>
        <option value="Software Project Management">Software Project Management</option>
        <option value="Optimization Techniques">Optimization Techniques</option>
        <option value="Advanced Internet Technologies">Advanced Internet Technologies</option>
        <option value="Advanced DBMS">Advanced DBMS</option>
        <option value="Open Course 3">Open Course 3</option>
        <option value="Open Course 4">Open Course 4</option>
        <option value="Project Review">Project Review</option>
        <option value="Aptitude">Aptitude</option>
        <option value="Mobile Application Development">Mobile Application Development</option>
        <option value="Data Warehousing & Data Mining">Data Warehousing & Data Mining</option>
        <option value="Software Testing & Quality Assurance">Software Testing & Quality Assurance</option>
        <option value="Knowledge Representation & Artificial Intelligence - ML, DL">Knowledge Representation & Artificial Intelligence - ML, DL</option>
        <option value="Cloud Computing">Cloud Computing</option>
        <option value="Open Course 5">Open Course 5</option>
        <option value="Open Course 6">Open Course 6</option>
        <option value="DevOps">DevOps</option>
        <option value="PPM and OB">PPM and OB</option>
        <option value="Java Lab">Java Lab</option>
        <option value="DSA Lab">DSA Lab</option>
        <option value="Python Lab">Python Lab</option>
        <option value="AIT Lab">AIT Lab</option>
        <option value="MAD Lab">MAD Lab</option>
        <option value="ML, DL Lab">ML, DL Lab</option>
        <option value="Short Break">Short Break</option>
        <option value="Lunch Break">Lunch Break</option>

    </select>
    </div>
</div>


            <center><input type="submit" name="submit" value="Submit" class="btn btn-primary" style="padding: 10px; width: 100px;"></center>
            <input type="hidden" name="id" value="<?=$id;?>" />
</form>
</div>
<br>

<?php
    }

?>
 </div>
 </div>
 </div>
 </div>
 </div>

 <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Designed by Gayatri Jadhav & Sayali Pawar. 
          
        </div>
      </div>
    </div>
  </footer>

  </body>
</html>
