<?php
include("config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $request_id = $_POST["request_id"];
  $approve = $_POST["approve"];
  
  
  if($approve == "Accepted"){
  $sql = "UPDATE Request SET Accepted = '$approve' WHERE RequestID = $request_id";
  }elseif($approve == "Rejected"){
    $sql = "UPDATE Request SET Accepted = '$approve' WHERE RequestID = $request_id";
  }
  if (mysqli_query($db, $sql)) {
    // Redirect back to the main page
    header("Location: tks2.html");
    exit();
  } else {
    echo "Error updating column: " . mysqli_error($db);
  }
}


?>