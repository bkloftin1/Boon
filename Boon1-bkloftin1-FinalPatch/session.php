<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   $ID =$_SESSION ['BusinessID'];
   $ID =$_SESSION ['CustomerID'];
   $table =$_SESSION ['userType'];

   $ses_sql = mysqli_query($db,"select $ID from $table where Username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $num_rows = mysqli_num_rows($ses_sql);
  

   $login_session = $row[$ID] ?? null;
 
   if(!isset($_SESSION['login_user'])){
      header("location:Login.html");
      die();
   }
?>