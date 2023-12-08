<?php



function getAllRequests($db, $business_id) {
    include("config.php");
    $default = "Pending";
    session_start();
    $requests = array();

    $sql = "SELECT Request.*, Customer.FirstName, Customer.LastName, Customer.PhoneNumber, Request.Address, Request.RequestDate, Request.RequestTime, Request.DetailsofService
            FROM Request
            INNER JOIN Customer ON Request.CustomerID = Customer.CustomerID
            WHERE Request.BusinessID = $business_id AND Request.Accepted ='$default'";
    $result = mysqli_query($db, $sql);

    while($row = mysqli_fetch_assoc($result)) {
        $requests[] = $row;
        
    }

    return $requests;
}

function updateRequestColumn($db, $request_id, $approve) {
    include("config.php");
    session_start();
    // Set the boolean value based on the button value
    $accept = ($approve == "decision") ? "Accepted" : "Rejected";
  
    // Update the column with the boolean value
    $sql = "UPDATE Request SET Accepted = $accept WHERE RequestID = $request_id";
  
    if (mysqli_query($db, $sql)) {
      echo "Column updated successfully";
    } else {
      echo "Error updating column: " . mysqli_error($db);
    }
  }

?>

