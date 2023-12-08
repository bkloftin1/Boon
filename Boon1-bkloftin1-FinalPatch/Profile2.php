<?php
session_start();
ob_start();
require_once('BusinessUpdate.php');
$username = $_SESSION['Username'];
$fname = $_SESSION['FirstName'];
$lname = $_SESSION['LastName'];
$mail = $_SESSION['Email'];
$pnumber= $_SESSION['PhoneNumber']; 
ob_end_clean();
if (isset($_POST['submit'])) {
  
  // get the values from the form fields
  $work = $_POST['nameOfBusiness'];
  $type = $_POST['typeOfService'];
  $description = $_POST['descriptionOfService'];
  

  // update the business table with the new values
  updateBusiness('nameOfBusiness', $work);
  updateBusiness('typeOfService', $type);
  updateBusiness('descriptionOfService', $description);
  
}




?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Provider Profile Page</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <link rel="stylesheet" href="./profile.css">


</head>
<body>
<!-- partial:index.partial.html -->
<!--
<div class="container">
  
  <div class="profile-header">
    <div class="profile-img">
      <img src="./bg.jpg" width="200" alt="Profile Image">
    
    </div>
    <div class="profile-nav-info">
      <h3 class="user-name">Username</h3>
      <div class="address">
        <p id="state" class="state">New York,</p>
        <span id="country" class="country">USA.</span>
      </div>
      
    </div>
-->
  <div class="profile-header">
		<div class="logo img">
			<a href="Fullfillment.html"><img src="logo.png" alt="Boon Logo"></a>
		</div>
		<div class="button">
			<a href="ongoing2.html">On going</a>
			<a href="help2.html">Help</a>
      <a href="Logout.php">Logout</a>
		</div>
	</div>

<!--
    <div class="profile-option">
      <div class="notification">
        <i class="fa fa-bell"></i>
        <span class="alert-message">69</span>
      </div>
    </div>
-->

  </div>

  <div class="main-bd">
    <div class="left-side">
      <div class="profile-side">
        
        <div class="profile-image">
		</div>
        
        <p class="username"><i class="fa fa-envelope"></i> <?php echo $fname, " ", $lname ?></p>        
        <p class="phone"><i class="fa fa-phone"></i> <?php echo $pnumber ?></p>
        <p class="email"><i class="fa fa-envelope"></i> <?php echo $mail ?></p>
        <div class="user-bio">
          <h3>Bio</h3>
          <p class="bio">
           
          </p>
        </div>
        <div class="profile-btn">
          <!--
          <button class="chatbtn" id="chatBtn"><i class="fa fa-comment"></i> Chat</button>
          
          <button class="createbtn" id="Create-post"><i class="fa fa-plus"></i> Create</button>
          -->
        </div>
        <div class="user-rating">
          <h3 class="rating"></h3>
          <div class="rate">
            <div class="star-outer">
              <div class="star-inner">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
            </div>
            <span class="no-of-user-rate"><span></span>&nbsp;&nbsp;</span>
          </div>

        </div>
      </div>

    </div>
    <div class="right-side">

      <div class="nav">
        <ul>
          <li onclick="tabs(0)" class="user-post active">Work</li>
          <li onclick="tabs(1)" class="card-edit">Edit</li>
          <li onclick="tabs(2)" class="user-setting"> Settings</li>
        </ul>
      </div>
      <div class="profile-body">
        
        <div class="profile-posts tab">
          <h1>Work Experience/Completed Work</h1>
          <p></p>
        </div>
        <div class="profile-reviews tab">
          <h1>Edit Card</h1>
          <form method="POST">
            <div class="form-group">
              <label for="work">Title/Company Name</label>
              <br>
              <textarea id="work" name="nameOfBusiness" rows="4" cols="50"></textarea>
            </div>
            <div class="form-group">
              <label for="type">Service Type</label>
              <br>
              <textarea id="type" name="typeOfService" rows="4" cols="50"></textarea>
            </div>
            <div class="form-group">
              <label for="description">Service Description</label>
              <br>
              <textarea id="description" name="descriptionOfService" rows="4" cols="50"></textarea>
            </div>
            <button type="submit" name="submit">Advertise</button>
          </form>
        </div>
        <div class="profile-settings tab">
          <div class="account-setting">
            <h1>Account Settings</h1>
          </div>
          <div class="card-body">
          <form action="update-business.php" method="POST">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" placeholder="Enter your username">
      </div>
      <div class="form-group">
        <label for="name">Full Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter your name">
      </div>
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" placeholder="Enter your email">
      </div>
      <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number">
      </div>
      <div class="form-group">
        <label for="bio">Bio</label>
        <br>
        <textarea id="bio" name="bio" rows="4" cols="50"></textarea>
      </div>
      <div class="form-group">
        <label for="work">Work</label>
        <br>
        <textarea id="work" name="work" rows="4" cols="50"></textarea>
      </div>
      <button type="submit" name="submit2"class="btn btn-primary">Save Changes</button>
    </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
  <script  src="./profile.js"></script>

</body>
</html>
