<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // Get form data
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
      $myfirstname = mysqli_real_escape_string($db,$_POST['first_name']);
      $mylastname = mysqli_real_escape_string($db,$_POST['last_name']);
      $myemail = mysqli_real_escape_string($db,$_POST['email']);
      $myphonenumber = mysqli_real_escape_string($db,$_POST['phone_number']);
      $user_type = $_POST['user_type'];

      // Debug: Print username, password, and user type
      echo "Username: " . $myusername . "<br>";
      echo "Password: " . $mypassword . "<br>";
      echo "User Type: " . $user_type . "<br>";

      // Insert data into the appropriate table based on user type
      if ($user_type == "Customer") {
         $sql = "INSERT INTO Customer (Username, Password, FirstName, LastName, Email, PhoneNumber) VALUES ('$myusername', '$mypassword', '$myfirstname', '$mylastname', '$myphonenumber', '$myemail')";
         $result = mysqli_query($db, $sql);

         if ($result) {
             echo "Customer registration successful!";
             // Redirect to the customer dashboard or login page
             header("location: Login.html");
         } else {
             echo "Error: " . $sql . "<br>" . mysqli_error($db);
         }
      } elseif ($user_type == "Business") {
         $sql = "INSERT INTO Business (Username, Password, FirstName, LastName, PhoneNumber, Email) VALUES ('$myusername', '$mypassword', '$myfirstname', '$mylastname', '$myphonenumber', '$myemail')";
         $result = mysqli_query($db, $sql);

         if ($result) {
             echo "Business registration successful!";
             // Redirect to the business dashboard or login page
             header("location: Login.html");
         } else {
             echo "Error: " . $sql . "<br>" . mysqli_error($db);
         }
      } else {
         echo "Invalid user type.";
      }
   }
?>
