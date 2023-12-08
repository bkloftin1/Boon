<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">

<?php
ob_start();
include("config.php");
session_start();
include("getCustomerRequest.php");
$requests = getAllAcceptedCustomerRequests($db, $_SESSION['UserID']);
ob_end_clean();

?>
?>

<!DOCTYPE html>

<head>
  <title>On going</title>
  <style>
  

  /* https://webdesign.tutsplus.com/tutorials/horizontal-scrolling-card-ui-flexbox-and-css-grid--cms-41922 */
  /* Template colors */
  :root {
  --green: #3cb043;
  --white: #e5e5e5;
  --platinum: #e5e5e5;
  --white: #fff;
  --thumb: #edf2f4;
  --lightgreen : #4ED656;
}

* {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
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
  padding-bottom: 5px; /*Affecting dropdown*/
}

.show {
  display: block;
}

body {
	font-family: Arial, sans-serif;
	margin: 0;
	padding: 0;
}

.header {
	background-color: #3cb043;
	color: #ffffff;
	padding: 20px 40px;
	display: flex;
	align-items: center;
	justify-content: space-between;
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
  background-color: #000000;
}

.container {
  max-width: 1600px;
  padding: 0 15px;
  margin: 100px auto;
}

h2 {
  font-size: 52px;
  margin-bottom: 1em;
  font-family: Arial, Helvetica, sans-serif ;
  text-align: center;
  margin-top: 100px;
}

.cards {
  display: flex;
  padding: 25px 0px;
  list-style: none;
  overflow-x: scroll;
  scroll-snap-type: x mandatory;
  height: 400px;
}

.card {
  display: flex;
  flex-direction: column;
  flex: 0 0 100%;
  padding: 20px;
  background: var(--lightgreen);
  border-radius: 12px;
  color: #ffffff;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 15%);
  scroll-snap-align: start;
  transition: all 0.2s;
  width: 300px; /* or any other fixed width */
  height: 300px; /* or any other fixed height */
  flex-shrink: 0;
}

.card:not(:last-child) {
  margin-right: 10px;
}

.card:hover {
  color: var(--green);
  background: var(--white);
  opacity: 1;
}

.card .card-title {
  font-size: 20px;
}

.card .card-content {
  margin: 20px 0;
  max-width: 85%;
}

.card .card-link-wrapper {
  margin-top: auto;
}

.card .card-link {
  display: inline-block;
  text-decoration: none;
  background: var(--green);
  padding: 6px 12px;
  border-radius: 8px;
  transition: background 0.2s;
  background-color: #ffffff;
  color: #000000;
}

.card:hover .card-link {
  background: var(--green);
  color: #ffffff;
}

.cards::-webkit-scrollbar {
  height: 12px;
}

.cards::-webkit-scrollbar-thumb,
.cards::-webkit-scrollbar-track {
  border-radius: 92px;
}

.cards::-webkit-scrollbar-thumb {
  background: var(--green);
}

.cards::-webkit-scrollbar-track {
  background: var(--thumb);
}

@media (min-width: 500px) {
  .card {
    flex-basis: calc(50% - 10px);
  }

  .card:not(:last-child) {
    margin-right: 20px;
  }
}

@media (min-width: 700px) {
  .card {
    flex-basis: calc(calc(100% / 3) - 20px);
  }

  .card:not(:last-child) {
    margin-right: 30px;
  }
}

@media (min-width: 1100px) {
  .card {
    flex-basis: calc(25% - 30px);
  }

  .card:not(:last-child) {
    margin-right: 40px;
  }
}

  </style>
</head>

<body>

  <div class="header">
    <div class="logo">
        <a href="Fullfillment.html"><img src="logo.png" alt="Boon Logo"></a>
      </div>
      <div class="button">
        <a href="help2.html">Help</a>
        <script src="dropdown.js"></script>
      <div class="profile-icon">
        <button onclick="myFunction()" class="dropbtn">Account</button>
        <div id="myDropdown" class="dropdown-content">S
          <hr class="profile">
          <a href="Profile.php">Profile</a>
          <hr class="solid">
          <a href="Logout.php">Log out</a>
        </div>
       </div>
      </div>
    </div>
  
    <h2>Bookings</h2>
  
  <div class="container">
    <ul class="cards">
    <?php foreach ($requests as $request): ?>
      <li class="card">
      <div>
                  <h3 class="card-title"><?php echo $request['nameOfBusiness']; ?></h3>
                  <div class="card-content">
                      <h4><?php echo $request['ServiceType'];?></h4>
                      <h5><?php echo "Address: ", $request['Address']; ?> </h5>
                      <h5><?php echo "Request Date: ",$request['RequestDate']; ?></h5>
                      <h5><?php echo "Request Time: ",$request['RequestTime']; ?></h5>
                      <h4><?php echo "Status: " , $request['Accepted'];?></h4>
                  </div>
              </div>
            <div class="card-link-wrapper">
            <form method="post" action="acceptance.php">
          <input type="hidden" name="request_id" value=<?php echo $request['RequestID'] ;?> >
          <button type="submit" name="approve" value="Rejected(Cancelled)" class="card-link">Cancel</button>
          </form>
      </li>
    <?php endforeach; ?>
          </div>
        </li>
    </ul>
  </div>
<script type="text/javascript" src="cards.js"></script>
</body>

</html>