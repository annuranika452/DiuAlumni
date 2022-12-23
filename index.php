<!DOCTYPE html>
<html lang="en">
<head>
<!-- Bootstrap 5 is a CSS Library that Helps to Make your Designs Easily -->
  <title>Admin Panel Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- These CSS and JS Files are neeeded to Load the Bootstrap Library on your Project -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- You can write Custom CSS Code Here -->
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>

</head>
<body>

<!-- Header Part of the Page -->
<div class="p-5 bg-primary text-white text-center">
  <h1>Welcome to DIU Alumni Portal | Login</h1>
  <p>Please Login Here at first</p> 
</div>

<!-- Main Container Area of the Page -->
<div class="container mt-5">
  <h2>Admin Login Page</h2>
  <code><i>Dear Admin, please login with your Username and Password!</i></code>
  <hr>
  
  <!-- In this Part you can do your PHP Code to Upload the CV (PDF), and either Passport (JPG) or NID (JPG) -->
  <?php 
        // Student Name: Annur Anika
        // Student ID: 192-16-452
        // Code Date: 9/04/22
        session_start();

if(isset($_POST["submit"]))
{       
if($_POST["email"]=="nirjhor@live.com" && $_POST["password"]=="abc123" )
{
  $_SESSION["verifyEmail"] = $_POST["email"];
  $_SESSION["loginTime"] = date("Y-m-d H:i:s");

  header ("Location: dashboard.php");
}
else

echo '
<div class="alert alert-info">
<strong>Message!</strong> Wrong Credential!
</div>
';

}
        echo '
            <div class="alert alert-danger">
            <strong>Sorry!</strong> Your credential is wrong. Please retry!
            </div>
        ';
  ?>
  
  <!-- Your HTML Form Starts here, check if all your input Field Properties are well Defined or not -->
  <form action="" method= "post">
    
    <div class="mb-3 mt-3">
      <label for="email">Email Address:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>

    <div class="mb-3 mt-3">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter Full Name" name="password">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary" name="submit">Login Now</button>
    </div>

  </form>

</div>

<!-- Footer Part of the Page -->
<div class="mt-5 p-4 bg-dark text-white text-center">
  <p>Daffodil International University</p>
</div>

</body>
</html>