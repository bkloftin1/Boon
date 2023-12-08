<?php
    function customerLogin() {
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
     
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);

      

      
      echo "Username: " . $myusername . "<br>";
      echo "Password: " . $mypassword . "<br>";
      echo "User Type: " . $userType . "<br>";

     
      

      
      $sql = "SELECT * FROM Customer WHERE Username = '$myusername' and Password = '$mypassword'";
      $result = mysqli_query($db,$sql);

      // If it equals one it collects user input
      if(mysqli_num_rows($result) == 1) {
          $row = mysqli_fetch_assoc($result);
          $_SESSION['login_user'] = $myusername;
          $_SESSION['Username'] = $row['Username'];
          $_SESSION['UserID'] = $row['CustomerID'];
          $_SESSION['FirstName'] = $row['FirstName'];
          $_SESSION['LastName'] = $row['LastName'];
          $_SESSION['Email'] = $row['Email'];
          $_SESSION['PhoneNumber'] = $row['PhoneNumber'];
          $_SESSION['userType'] = $userType; // Store the user type in the session

          // Redirect 
          $redirectPage = $userType === 'customer' ? 'testhome.php' : 'Fullfillment.html';
          header("location: testhome.php");
          print("Login Succeeded");
      } else {
          $error = "Your Login Name or Password is invalid";
          echo $error; // Debug: Print error message
      }
   }
}
function businessLogin (){
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);

      

     
      echo "Username: " . $myusername . "<br>";
      echo "Password: " . $mypassword . "<br>";
      echo "User Type: " . $userType . "<br>";

      

      
      $sql = "SELECT * FROM Business WHERE Username = '$myusername' and Password = '$mypassword'";
      $result = mysqli_query($db,$sql);

      
      if(mysqli_num_rows($result) == 1) {
          $row = mysqli_fetch_assoc($result);
          $_SESSION['login_user'] = $myusername;
          $_SESSION['UserID'] = $row['BusinessID'];
          $_SESSION['Username'] = $row['Username'];
          $_SESSION['FirstName'] = $row['FirstName'];
          $_SESSION['LastName'] = $row['LastName'];
          $_SESSION['Bio'] = $row['bio'];
          $_SESSION['BusinessName'] = $row['nameOfBusiness'];
          $_SESSION['Email'] = $row['Email'];
          $_SESSION['PhoneNumber'] = $row['PhoneNumber'];
          $_SESSION['userType'] = $userType; // Store the user type in the session

          // Redirect to the appropriate page based on the user type
          header("location: Fullfillment.php");
          print("Login Succeeded");
      } else {
          $error = "Your Login Name or Password is invalid";
          echo $error; // Debug: Print error message
      }
   }
}

if (isset($_POST['customer_submit'])) {
    customerLogin();
} else if (isset($_POST['business_submit'])) {
    businessLogin();
}
?>
