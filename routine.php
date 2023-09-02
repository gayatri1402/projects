<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Department Of MCA.</title>

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

  <br>
  <br>
  <br>

<?php include('db_con.php');?>


<?php
	error_reporting(E_ERROR||E_WARNING);
	$s=$_REQUEST['session'];
	$op=mysqli_query($conn,"SELECT DISTINCT session FROM routine");
	$wk=$_REQUEST['week'];
	$op1=mysqli_query($conn,"SELECT DISTINCT week FROM routine");
?>
<form action="routine.php" method="post" name="myForm" role="form">
<div class="form-group">
<label for="type">
   	Select Session:
</label>
	<SELECT name="session">
	<option value='alls'>All</option>
<?php 	while ($t=mysqli_fetch_array($op)){ 
	    		$Se=$t['session'];
	    		if(strcmp ($Se,$s) == 0){$isSelected="selected";
	    		}else{$isSelected="";	    		}
	    	?>
	    	
		
		<option value="<?php echo $Se; ?>"  <?=$isSelected; ?>   ><?php echo $Se; ?></option>
<?php } ?>
	</SELECT>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label for="type">
   	Select Week:
</label>
<SELECT name="week">
	<option value='allw'>All</option>
	<?php 	  
	    while ($w=mysqli_fetch_array($op1)){ 
	    		$week=$w['week'];
	    		if(strcmp ($week,$wk) == 0){$isSelected="selected";
	    		}else{$isSelected="";	    		}
	    	?>
	<option value="<?php echo $week; ?>"  <?=$isSelected; ?>   ><?php echo $week; ?></option>
	<?php } ?>
	</SELECT><br/></br>
	<br>
	<a href="index.html" class="btn btn-warning" style="padding: 10px; width: 100px; left: 20px;"> Go Back </a>

	
	<input type="submit" name="submit" value="Search" class="btn btn-danger">
</div>
</form>


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

<br>
<br>
<br>
<?php
if(isset($_POST['submit'])){
      echo "<div class='col-sm-12'>";
      echo "<a href='javascript:Clickheretoprint()' class='btn btn-info' style='float:right;'>Print</a>";
      echo "</div>";
      
      echo "<div id='print_content'>";
      echo "<table class='table table-bordered'>";
      echo "<thead>";
      echo "<tr>";
      echo "<th>Day</th>";
      echo "<th>Year</th>";
      echo "<th>Session</th>";
      echo "<th>Time</th>";
      echo "<th>Theory/Lab</th>";
	  echo "<th>Subject</th>";
      echo "<th>Teacher</th>";     
      echo "</tr>";
      echo "</thead>";

  if ($s=='alls' && $wk=='allw'){
  	$qall=mysqli_query($conn,"SELECT * FROM routine");
      
      
  	while ($all=mysqli_fetch_array($qall)) {
      
      echo "<tbody>";
      echo "<tr class='success'>";
      echo "<td>".$all['week']."</td>";
      echo "<td>".$all['year']."</td>";
      echo "<td>".$all['session']."</td>";
      echo "<td>".$all['time']."</td>";
  		echo "<td>".$all['type']."</td>";
  		echo "<td>".$all['subject']."</td>";
		  echo "<td>".$all['teacher']."</td>";
  		

}     
  }


   else if ($s!='alls'&& $wk=='allw'){
   $qwk=mysqli_query($conn,"SELECT * FROM routine where session='$s'");


   while ($week=mysqli_fetch_array($qwk)) {
  		echo "<tbody>";
      echo "<tr class='success'>";
      echo "<td>".$week['week']."</td>";
      echo "<td>".$week['year']."</td>";
      echo "<td>".$week['session']."</td>";
      echo "<td>".$week['time']."</td>";
      echo "<td>".$week['type']."</td>";
	  echo "<td>".$week['subject']."</td>";
      echo "<td>".$week['teacher']."</td>";


  }
      
  }


  else if ($s=='alls' && $wk!='allw'){
   $qse=mysqli_query($conn,"SELECT * FROM routine where week='$wk'");

   while ($sess=mysqli_fetch_array($qse)) {
  		
      echo "<tbody>";
      echo "<tr class='success'>";
      echo "<td>".$sess['week']."</td>";
      echo "<td>".$sess['year']."</td>";
      echo "<td>".$sess['session']."</td>";
      echo "<td>".$sess['time']."</td>";
      echo "<td>".$sess['type']."</td>";
	  echo "<td>".$sess['subject']."</td>";
      echo "<td>".$sess['teacher']."</td>";


      

  }
  }


  else {
  	$other=mysqli_query($conn,"SELECT * FROM routine where session='$s' AND week='$wk'");


  	while ($filter=mysqli_fetch_array($other)) {
  		
      echo "<tbody>";
      echo "<tr class='success'>";
      echo "<td>".$filter['week']."</td>";
      echo "<td>".$filter['year']."</td>";
      echo "<td>".$filter['session']."</td>";
      echo "<td>".$filter['time']."</td>";
      echo "<td>".$filter['type']."</td>";
	  echo "<td>".$filter['subject']."</td>";
      echo "<td>".$filter['teacher']."</td>";

  	

}
      
}
      echo "</table>";
      echo "</div>";
      
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