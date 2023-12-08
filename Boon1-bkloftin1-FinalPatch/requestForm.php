<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Test Home Environment</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
  <?php
  session_start();
  ob_start();
  require_once("config.php");
  include("Business.php");
  $businesses = getAllBusinesses($db);
  mysqli_close($db);
  ?>
  <style>
    body {
      font-family: "Roboto", sans-serif;
      color: #333;
      padding: 0;
      margin: 0;
      font-size: 16px;
    }

    .header {
  background-color: #3cb043;
  color: #ffffff;
  padding: 10px 20px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.dropbtn {
  background-color: #000000;
  color: #ffffff;
  border: none;
  border-radius: 20px;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  margin-right: 10px;
  text-decoration: none;
}

.dropbtn:hover {
  background-color: #f5f5f5;
  color: #000000;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #00000000;
  min-width: 200px;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  font-family: helvetica;
  padding: 5px 5px;
  text-decoration: none;
  display: block;
}

hr.solid {
  border-left: none;
  border-right: none;
  border-top: 1px solid #000000;
  border-bottom: none;
}

.show {
  display: block;
}


body {
  font-family: "Roboto", sans-serif;
  color: #333;
  padding: 0;
  margin: 0;
  font-size: 16px;
}

.logo {
  margin-right: auto; /* keep logo on the right */
}

.logo img {
  width: 100px;
}

.button {
  display: flex;
  align-items: center;
    justify-content: flex-start; /* align buttons to the left */
}

.button a {
  background-color: #000000;
  color: #ffffff;
  border: none;
  border-radius: 20px;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  margin-right: 10px;
  text-decoration: none;
}

.button a:hover {
  background-color: #f5f5f5;
  color: #000000;
}

.profile-icon img {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  margin-left: 10px;
}

    .form-container {
      margin: 0 auto;
      width: 80%;
      max-width: 800px;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .form-field {
      width: 100%;
      padding: 0.5rem;
      margin-bottom: 1rem;
    }

    .form-field label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: 700;
    }

    .form-field input[type=text],
    .form-field input[type=time],
    .form-field input[type=date],
    .form-field textarea {
      width: 100%;
      padding: 0.5rem;
      border: 1px solid #ccc;
      border-radius: 3px;
      font-size: 1rem;
      line-height: 1.5;
    }

    .form-field button[type=submit] {
      background-color: #000000;
      color: #ffffff;
      border: none;
      border-radius: 20px;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      margin-top: 10px;
    }

    .form-field button[type=submit]:hover {
      background-color: #f5f5f5;
      color: #000000;
    }
  </style>
</head>

<body>

  <div class="header">
		<div class="logo">
		  <a href="testhome.html"><img src="logo.png" alt="Boon Logo"></a>
		</div>
		<div class="button">
		  <a href="help.html">Help</a>
     <script src="dropdown.js"></script>
      <div class="profile-icon">
        <button onclick="myFunction()" class="dropbtn">Account</button>
        <div id="myDropdown" class="dropdown-content">
          <hr class="profile">
          <a href="Profile.php">Profile</a>
          <hr class="solid">
          <a href="">Log out</a>s
        </div>
      </div>
		</div>
	</div>
  <div class="form-container">
  <form method="POST" action="request.php">
    <div class="form-field">
      <label for="business">Business:</label>
      <select name="business" id="business">
        <?php foreach ($businesses as $business) { ?>
          <?php if ($name == $business['nameOfBusiness']) { ?>
            <option value="<?php echo $business['BusinessID']; ?>" selected><?php echo $business['nameOfBusiness']; ?> </option>
          <?php } else { ?>
            <option value="<?php echo $business['BusinessID']; ?>"><?php echo $business['nameOfBusiness']; ?></option>
          <?php } ?>
        <?php } ?>
      </select>
    </div>
</div>

    <div class="form-field">
      <label for="address">Service address:</label>
      <input type="text" id="address" name="address" required>
    </div>
    <div class="form-field">
        <label for="time">Time:</label>
        <input type="time" id="time" name="time" required>
      </div>

      <div class="form-field">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>
      </div>

    <div class="form-field">
      <label for="service-type">Service Type:</label>
      <div class="radio-buttons">
      <label><input type="radio" name="serviceType" value="Standard" checked>Standard: Cutting grass Weed Whacked</label>
      <label><input type="radio" name="serviceType" value="Premium">Premium: Standard with Landscaping, Landscaping only</label>
      </div>
    </div>

      <div class="form-field">
        <label for="details">Details of Service:</label>
        <textarea id="details" name="details" rows="5" required></textarea>
      </div>

    <div class="form-field">
    <input type="hidden" name="user_id" value="<?php echo $_SESSION['UserID']; ?>""">
      <button type="submit">Submit</button>
    </div>
  </form>
</div>