<?php
function updateBusiness($column, $value) {
  // connect to the database
  ob_clean();
  include("config.php");
   session_start();
   $businessID = $_SESSION['UserID'];
   $value = mysqli_real_escape_string($db, $value);
   ob_end_clean();

  // prepare SQL query
  $sql = "UPDATE Business SET $column = '$value' WHERE BusinessID = '$businessID' ";

  // execute query
  if (mysqli_query($db, $sql)) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . mysqli_error($db);
  }

  // close connection
  mysqli_close($db);
}
?>