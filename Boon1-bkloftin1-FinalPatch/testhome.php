<?php
session_start();
ob_start();
require_once("config.php");
include("Business.php");
echo "User ID (CustomerID): " . $_SESSION['UserID'];
$businesses = getAllBusinesses($db);
mysqli_close($db);
ob_end_clean();
?>

<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    
    <style>
.card-box:nth-child(1n) > .image {
  background-color: #3cb043;
}
.card-box:nth-child(2n) > .image {
  background-color: #3cb043;
}
.card-box:nth-child(3n) > .image {
  background-color: #3cb043;
}
.card-box:nth-child(4n) > .image {
  background-color: #3cb043;
}
.card-box:nth-child(5n) > .image {
  background-color: #3cb043;
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

.container {
  width: fit-content;
  display: flex;
  overflow-x: hidden;
  height: auto;
  overflow-y: hidden;
}

.--box-shadow {
  box-shadow: inset 0px 0px 28px -10px #c5c5c5;
}

.items-cont {
  padding: 0rem 5rem;
  display: flex;
  min-width: 100%;
  width: fit-content;
  box-sizing: border-box;
  transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}

.card-box {
  position: relative;
  display: block;
  width: 22rem;
  min-width: 22rem;
  height: 19rem;
  margin: 3rem;
  overflow: visible;
  cursor: pointer;
  margin-bottom: 200px;
  margin-top: 200px;
}
.card-box:hover .description {
  left: 10%;
}
.card-box .image {
  position: absolute;
  box-shadow: -5px 0px 30px rgba(54, 54, 54, 0.22);
  border-radius: 6px;
  width: 62.5%;
  right: 0;
  top: 0;
  height: 100%;
  /*z-index: 0;*/
  background-repeat: no-repeat;
  background-position: 50% 50%;
  background-size: cover;
}
.card-box .description {
  position: absolute;
  width: 42.5%;
  height: calc(75% - 2rem);
  left: 0%;
  top: calc((25.5% / 2) - 1rem);
  background-color: #fff;
  box-shadow: -4px 6px 45px rgba(54, 54, 54, 0.15);
  border-radius: 6px;
  /*z-index: 0;*/
  padding: 2rem 1.7rem;
  transition: all 0.3s;
}
.card-box .description h5 {
  font-size: 1rem;
  font-weight: 700;
  line-height: 1.2em;
  color: #444;
  margin-top: 0;
  margin-bottom: 0;
}
.card-box .description .small-text {
  font-size: 0.8em;
  margin-top: 0.35em;
  color: #d2d2d2;
  line-height: 1.45em;
}
.card-box .description .long-text {
  margin-top: 1rem;
  font-size: 0.88rem;
  line-height: 1.35;
  color: #656565;
}

::-webkit-scrollbar {
  display: none;
}

.select-button {
  background-color: #ffffff;
  border: 1px solid #000000;
  border-radius: 20px;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  margin-top: 10px;
}
.select-button:hover {
  background-color: #000000;
  color: #ffffff;
}

    </style>
</head>

<!-- Your HTML head and styling -->

<body>
<div class="header">
		<div class="logo">
		  <a href="testhome.html"><img src="logo.png" alt="Boon Logo"></a>
		</div>
		<div class="button">
		  <a href="ongoing1.php">Recent</a>
		  <a href="help.html">Help</a>
     <script src="dropdown.js"></script>
      <div class="profile-icon">
        <button onclick="myFunction()" class="dropbtn">Account</button>
        <div id="myDropdown" class="dropdown-content">
          <hr class="profile">
          <a href="Profile.php">Profile</a>
          <hr class="solid">
          <a href="Logout.php">Log out</a>
        </div>
      </div>
		</div>
	</div>

  <div class="container --box-shadow">
  <div class="items-cont">
    <?php foreach ($businesses as $business): ?>
      <div class="card-box">
        <div class="image"></div>
        <div class="description">
          <h5><?php echo $business['nameOfBusiness'] ?? '';?></h5>
          <span class="small-text">
            <?php echo $business['typeOfService'] ?? '';?>
          </span>
          <p class="long-text">
            <?php echo $business['descriptionOfService'] ?? ''; ?>
          </p>
          <body>
         
            <link href="popup.css" rel="stylesheet">
            <script defer src="popup.js"></script>
            <form action="requestForm.php" method="POST">
              <input type="hidden" name="business_name" value="<?php echo $business['nameOfBusiness'] ?? '';?>">
              <input type="hidden" name="business_id" value="<?php echo $business['BusinessID']; ?>">
              <button type="submit" class="select-button">Select</button>
            </form>
            <div class="modal" id="modal">
              <div class="modal-header">
                <div class="title">You sure?</div>
                <button data-close-button class="close-button">&times;</button>
              </div>
              <div class="form-group">
                <label for="bio">Comment/Request</label>
                <br>
                <textarea id="bio" name="bio" rows="4" cols="60"></textarea>
              </div>
              <div class="form-group">
                <label for="business">Business</label>
                <br>
                <select id="business" name="business">
                  <option value="<?php echo $business['nameOfBusiness'] ?? '';?>"><?php echo $business['nameOfBusiness'] ?? '';?></option>
                </select>
              </div>
              <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
              <button type="submit" class="select-button"> Accept</button>
            </div>
            <div id="overlay"></div>
          </body>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>