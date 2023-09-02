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
            <h2>Admin Login</h2>
            <div class="div-dec"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <br>
  


<?php
	require_once 'db_con.php';

// Define the validation rules for the username and password
$usernameRegex = '/^[a-zA-Z0-9_]{3,20}$/'; // Allows alphanumeric characters and underscores, with a length of 3-20 characters
$passwordRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/'; // Requires at least one lowercase letter, one uppercase letter, one digit, and a minimum length of 6 characters

// Validate the username and password
if (isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    $errors = array(); // Initialize an array to store validation errors

    // Validate the username
    if (!preg_match($usernameRegex, $user_name)) {
        $errors['user_name'] = 'Username must be alphanumeric and between 3-20 characters.';
    }

    // Validate the password
    if (!preg_match($passwordRegex, $password)) {
        $errors['password'] = 'Password must contain at least one lowercase letter, one uppercase letter, one digit, and be at least 6 characters long.';
    }

    // If there are no validation errors, proceed with further processing
    if (empty($errors)) {
        // Perform your login or registration logic here
        // ...
    }
    
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $user_name = mysqli_real_escape_string($conn,$_POST['user_name']);
      $password = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT id FROM admin WHERE user_name = '$user_name' and password = '$password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $user_name;
         
         header("location: welcome_admin.php");
      }else {
        echo "<div class='alert alert-danger'>";
        echo "<strong>Your Login Name or Password is invalid</strong>";
        echo "</div>";
      }
   }

    
}
?>

<!-- HTML form -->
<a href="index.html" class="btn btn-warning" style="padding: 10px; width: 100px; left: 20px;"> Go Back </a>
<br>
<br>
<form action="" method="POST">
    <label for="user_name">Username:</label>
    <input type="text" name="user_name" id="user_name">
    <?php if (isset($errors['user_name'])) { echo '<span style="color: red;">' . $errors['user_name'] . '</span>'; } ?>
    <br><br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password">
    <?php if (isset($errors['password'])) { echo '<span style="color: red;">' . $errors['password'] . '</span>'; } ?>
    <br><br>
    <a href="forgot_password.php" class="btn btn-warning" style="padding: 10px; width: 160px; left: 20px;"> Forgot_Password </a>

    <left><input type="submit" name="submit" value="Submit" class="btn btn-primary" style="padding: 10px; width: 100px;"></left>
    <br>
    <br>
</form>


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