<?php
include("config.php");
session_start();

function getAllAcceptedRequests($db, $business_id) {
    $requests = array();

    $sql = "SELECT Request.*, Customer.FirstName, Customer.LastName, Customer.PhoneNumber, Request.Address, Request.RequestDate, Request.RequestTime, Request.ServiceType
    FROM Request
    INNER JOIN Customer ON Request.CustomerID = Customer.CustomerID
    WHERE Request.BusinessID = $business_id AND Request.Accepted = 'Accepted' ";
    $result = mysqli_query($db, $sql);

    while($row = mysqli_fetch_assoc($result)) {
        $requests[] = $row;
    }

    return $requests;
}

function cancelRequestColumn($db, $request_id, $approve) {
    // Set the boolean value based on the button value
    $accept = ($approve == "value1") ? true : false;
  
    // Update the column with the boolean value
    $sql = "UPDATE Request SET Accepted = $accept WHERE RequestID = $request_id";
  
    if (mysqli_query($db, $sql)) {
      echo "Column updated successfully";
    } else {
      echo "Error updating column: " . mysqli_error($db);
    }
  }

?>

