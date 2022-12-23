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
  <h1>Welcome to DIU Alumni Portal | Dashboard</h1>
  <p>You can save your Member Profiles from this Admin Panel!</p> 
</div>

<!-- Navigation Part / Menu Part of the Page -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="dashboard.php">Admin Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Our Members</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Member Benefits</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Job Openings</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Special Deals</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?exit=yes">Logout</a>
      </li>
    </ul>
  </div>
</nav>

<!-- Main Container Area of the Page -->
<div class="container mt-5">
  <h2>Member Enrollment Form</h2>
  <code><i>Dear member, please upload your CV (Mandatory) in PDF format, and Passport or NID Card (Any one) in JPG format!</i></code>
  <hr>
  
  <!-- In this Part you can do your PHP Code to Upload the CV (PDF), and either Passport (JPG) or NID (JPG) -->
  <?php 
        // Student Name: Annur Anika
        // Student ID: 192-16-452
        // Code Date: 9/04/22

        session_start();
        if(!isset($_SESSION["verifyEmail"]))
        {
          session_destroy();
          header("Location: index.php");
        }

        if(@$_GET["exit"] == "yes")
        {
          session_destroy();
          header("Location: index.php");
        }

if(isset($_SESSION["verifyEmail"]))
{
  echo "<strong> Dear (" . $_SESSION["verifyEmail"] . "). Welcome to Dashboard! <br> <br> </strong>";

  
}

class commonFeatures{

  function checkPdf ($file){
    if(
      $file["error"]==0 &&
       $file["type"]=="application/pdf" &&
      $file['size'] < 5000000
    )
    
      return true;
    else
      return false;
    
  }

  function checkImage ($file){
    if(
      $file["error"]==0 &&
      $file["type"]=="image/jpg" || $file["type"]=="image/jpeg" &&
      $file['size'] < 1000000
    )
      return true;
    else
      return false;
    
  }
}

if(isset($_POST['button']))
{
	
  $commonFeatures = new commonFeatures;
	
		if ($commonFeatures->checkPdf($_FILES["cv"]) && ( $commonFeatures->checkImage($_FILES["passport"]) || $commonFeatures->checkImage($_FILES["nid"]) )){
      if($commonFeatures->checkPdf($_FILES["cv"]) && $commonFeatures->checkImage($_FILES["passport"]) && $commonFeatures->checkImage($_FILES["nid"])){

			move_uploaded_file($_FILES['cv']['tmp_name'], "uploads/cv/" . "_" . date("YmdHis").rand(1000,999)."_". $_FILES['cv']['name']);
			move_uploaded_file($_FILES['passport']['tmp_name'], "uploads/passport/" . "_" . date("YmdHis").rand(1000,999)."_". $_FILES['passport']['name']);
      move_uploaded_file($_FILES['nid']['tmp_name'], "uploads/nid/" . "_" . date("YmdHis").rand(1000,999)."_". $_FILES['nid']['name']);

      echo '
      <div class="alert alert-info">
      <strong>Message!</strong> Your CV, Passport and NID is uploaded successfully. Thanks for registration!
      </div>
  ';

		}
		else if ($commonFeatures->checkPdf($_FILES["cv"]) && $commonFeatures->checkImage($_FILES["passport"]))
		{
			move_uploaded_file($_FILES['cv']['tmp_name'], "uploads/cv/" . $_FILES['cv']['name']);
			move_uploaded_file($_FILES['passport']['tmp_name'], "uploads/passport/" . "_" . date("YmdHis").rand(1000,999)."_". $_FILES['passport']['name']);

      echo '
      <div class="alert alert-info">
      <strong>Message!</strong> Your CV and Passport is uploaded successfully. Thanks for registration!
      </div>
  ';

		}

    else if ($commonFeatures->checkPdf($_FILES["cv"]) && $commonFeatures->checkImage($_FILES["nid"]))
		{
			move_uploaded_file($_FILES['cv']['tmp_name'], "uploads/cv/" ."_" . date("YmdHis").rand(1000,999)."_".  $_FILES['cv']['name']);
			move_uploaded_file($_FILES['nid']['tmp_name'], "uploads/nid/" . "_" . date("YmdHis").rand(1000,999)."_". $_FILES['nid']['name']);

			
      echo '
      <div class="alert alert-info">
      <strong>Message!</strong> Your CV and NID is uploaded successfully. Thanks for registration!
      </div>
  ';
		}

	
	}
	else 
	
    {
      echo '
            <div class="alert alert-info">
            <strong>Message!</strong> You are missing any of the required files. Unable to register you! 
            </div>
        ';
    }
		
}



        echo '
            <div class="alert alert-info">
            <strong>Message!</strong> This is an Alert Message that you can show after submission of the Form to show whether the Files are Uploaded to the Folder or not!
            </div>
        ';
  ?>
  
  <!-- Your HTML Form Starts here, check if all your input Field Properties are well Defined or not -->
  <form action="" method= "post" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
      <label for="fullname">Full Name:</label>
      <input type="text" class="form-control" id="fullname" placeholder="Enter Full Name" name="fullname">
    </div>
    <div class="mb-3 mt-3">
      <label for="mobile">Mobile No:</label>
      <input type="text" class="form-control" id="fullname" placeholder="Put Mobile No starting with 880" name="mobile">
    </div>
    
    <div class="mb-3 mt-3">
      <label for="email">Email Address:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="mb-3">
      <label for="cv">CV (PDF only, Required)</label>
      <input type="file" class="form-control" id="cv" placeholder="DOC file only" name="cv">
    </div>
    <div class="mb-3">
      <label for="passport">Passport (Scancopy, JPG only):</label>
      <input type="file" class="form-control" id="passport" placeholder="JPG file only" name="passport">
    </div>
    <div class="mb-3">
      <label for="nid">NID Card (Scancopy, JPG only):</label>
      <input type="file" class="form-control" id="nid" placeholder="JPG file only" name="nid">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary" name="button">Save Member</button>
    </div>
  </form>

</div>

<!-- Footer Part of the Page -->
<div class="mt-5 p-4 bg-dark text-white text-center">
  <p>Daffodil International University</p>
</div>

</body>
</html>