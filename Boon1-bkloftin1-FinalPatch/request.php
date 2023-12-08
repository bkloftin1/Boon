<?php


include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user_id = $_POST["user_id"];
  $business_id = $_POST["business"];
  $address = $_POST['address'];
  $details = $_POST['details'];
  $time = $_POST['time'];
  $date = $_POST['date'];
  $serviceType = $_POST['serviceType'];
  // Insert into the request table
  $stmt = $db->prepare("INSERT INTO Request (CustomerId, BusinessId, DetailsOfService, RequestTime, RequestDate, Address, ServiceType) VALUES (?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("iisssss", $user_id, $business_id, $details, $time, $date, $address, $serviceType);
  $stmt->execute();


  // Redirect back to the main page
  header("Location: tks.html");
  exit();
}
?>
