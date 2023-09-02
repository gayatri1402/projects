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




  <?php include('db_con.php');?>


<br>
<div class="col-sm-10 col-sm-offset-2">
<?php

    if(isset($_POST['submit'])){
        $r_id = $_POST['id'];
        $week = $_POST['week'];
        $year = $_POST['year'];
        $session = $_POST['session'];
        $type = $_POST['type'];
        $time = $_POST['time'];
        $s_name = $_POST['subject'];
        $t_name = $_POST['teacher'];



        

    if($week!=NULL && $year!=NULL && $session!=NULL && $type!=NULL && $time!=NULL && $s_name!=NULL && $t_name!=NULL){

    $sql = "INSERT INTO routine (week,year,session,type,time,subject,teacher) VALUES ('$week','$year','$session','$type','$time','$s_name','$t_name')";

    $result = mysqli_query($conn,$sql);

    if($result){
        echo "<div class='alert alert-success'>";
        echo "<strong>Success!</strong> Insert Successfully";
        echo "</div>";
    }else{
        echo "<div class='alert alert-success'>";
        echo "<strong>Error!</strong> in submisssion.Please try again.";
        echo "</div>";
    }
    }
}

?>

<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=400, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Inel Power System</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 400px; font-size:12px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>

<form action="routine_insert.php" method="post" class="form-horizontal" role="form">
<a href="welcome_admin.php" class="btn btn-warning" style="padding: 10px; width: 100px; left: 20px;"> Go Back </a>
<br>
<br>
<div class="form-group">
    <label class="col-sm-2 control-label"><b><u>Week:</u></b></label>
    <div class="col-sm-7">
    <select class="form-control" name="week">
    <option value=" "></option>

        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
        <option value="Saturday">Saturday</option>
    </select>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label"><b><u>Year:</u></b></label>
    <div class="col-sm-7">
    <select class="form-control" name="year">
    <option value=" "> </option>

        <option value="1-1">1-1</option>
        <option value="1-2">1-2</option>
        <option value="2-1">2-1</option>
        <option value="2-2">2-2</option>
        
       
    </select>
    </div>
</div>

<div class="form-group">
    <label for="session" class="col-sm-2 control-label"><b><u>Session:</u></b></label>
    <div class="col-sm-7">
    <input type="text" class="form-control" name="session" placeholder="Session(Example:2011-2012)">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label"><b><u>Type:</u></b></label>
    <div class="col-sm-7">
    <select class="form-control" name="type">
        <option value="Theory">Theory</option>
        <option value="Lab">Lab</option>
        <option value="Lab">Lab/Theory</option>
    </select>
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

<div class="form-group">
    <label for="teacher" class="col-sm-2 control-label"><b><u>Teacher:</u></b></label>
    <div class="col-sm-7">
    <input type="text" class="form-control" name="teacher" placeholder="Enter teacher name">
    </div>
</div>


    <br>
    <br>
    <center><input type="submit" name="submit" value="Submit" class="btn btn-primary" style="padding: 10px; width: 100px;"></center>
            <input type="hidden" name="id" value="<?=$id;?>" />
</form>

</div>


<?php
      echo "<div class='col-sm-12'>";
      echo "<a href='javascript:Clickheretoprint()' class='btn btn-info' style='float:right;'>Print</a>";
      echo "</div>";
      
      echo "<div id='print_content'>";
      echo "<table class='table table-bordered'>";
      echo "<thead>";
      echo "<tr>";
      echo "<th>ID</th>";
      echo "<th>Day</th>";
      echo "<th>Year</th>";
      echo "<th>Session</th>";
      echo "<th>Time</th>";
      echo "<th>Type</th>";
      echo "<th>Subject</th>";
      echo "<th>Teacher</th>";
      echo "<th>Actions</th>";
      echo "</tr>";
      echo "</thead>";

    $other=mysqli_query($conn,"SELECT * FROM routine");


    while ($filter=mysqli_fetch_array($other)) {
        
      echo "<tbody>";
      echo "<tr class='success'>";
      echo "<td>".$filter['r_id']."</td>";
      echo "<td>".$filter['week']."</td>";
      echo "<td>".$filter['year']."</td>";
      echo "<td>".$filter['session']."</td>";
      echo "<td>".$filter['time']."</td>";
      echo "<td>".$filter['type']."</td>";

      echo "<td>".$filter['subject']."</td>";
      echo "<td>".$filter['teacher']."</td>";



        echo '<td><a href="routine_delete.php?id='.$filter['r_id'].'" onclick=\'return confirm("Are you sure you want to delete this record?")\'><b class="btn btn-danger">Delete</b></a></td>' ;
        echo '<td><a href="routine_update.php?id='.$filter['r_id'].'" onclick=\'return confirm("Are you sure you want to update this record?")\'><b class="btn btn-danger">Update</b></a></td>' ;

      
      echo "</tr>";
      echo "</tbody>";
      

}
      
      echo "</table>";
      echo "</div>";
      
      
?>
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
