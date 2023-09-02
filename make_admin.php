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
            <h2>Make New Admin</h2>
            <div class="div-dec"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
<br>
<br>
  <?php
// Include the database connection file
include('db_con.php');

if (isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    // Validate the input
    if (!empty($user_name) && !empty($password)) {
        // Prepare the query using prepared statements
        $stmt = $conn->prepare("INSERT INTO admin (user_name, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $user_name, $password);
        
        // Execute the query
        if ($stmt->execute()) {
            // New admin created successfully
            session_start();
            session_destroy();

            echo "<div class='alert alert-success'>";
            echo "<strong>New admin created successfully. Redirecting to login page. Please wait...</strong>";
            echo "</div>";
            header("Refresh: 2; URL=about-us.php");
            exit;
        } else {
            // Error in executing the query
            echo "<div class='alert alert-danger'>";
            echo "<strong>Error!</strong> Failed to create new admin. Please try again.";
            echo "</div>";
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        // Empty fields
        echo "<div class='alert alert-danger'>";
        echo "<strong>Error!</strong> Please enter both the username and password.";
        echo "</div>";
    }
}
?>

<!-- HTML form -->
<div class="col-md-8 col-md-offset-2">

    <!-- <center><h3>Make a new Admin</h3></center> -->
    <a href="about-us.php" class="btn btn-warning" style="padding: 10px; width: 100px;"> Go Back </a>
    <br>
    <br>
    <form action="make_admin.php" method="post" class="form-horizontal" role="form">
        <div class="form-group">
            <label for="user_name" class="col-sm-2 control-label">User Name</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="user_name">
                <p style="color:red">(Note : Username must be alphanumeric and between 3-20 characters.)</p>

            </div>
        </div>
        <br>

        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-7">
                <input type="password" class="form-control" name="password">
                <p style="color:red;">(Note : Password must contain at least one lowercase letter, one uppercase letter, one digit, and be at least 6 characters long.)</p>

            </div>
        </div>
        <br>
        <input type="submit" name="submit" value="Submit" class="btn btn-primary" style="padding: 10px; width: 100px;">
        <input type="hidden" name="id">
        
    </form>

</div>

 <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Designed by Gayatri Jadhav and Sayali Pawar.
          
        </div>
      </div>
    </div>
  </footer>


  </body>
</html>