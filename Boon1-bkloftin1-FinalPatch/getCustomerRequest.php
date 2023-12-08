<?php
include("config.php");
session_start();

function getAllAcceptedCustomerRequests($db, $business_id) {
    $requests = array();

    $sql = "SELECT Request.*, Business.nameOfBusiness, Request.Accepted, Request.ServiceType, Request.Address, Request.RequestDate, Request.RequestTime
    FROM Request
    INNER JOIN Business ON Request.BusinessID = Business.BusinessID
    WHERE Request.CustomerID = $business_id";
    $result = mysqli_query($db, $sql);

    while($row = mysqli_fetch_assoc($result)) {
        $requests[] = $row;
    }

    return $requests;
}

?>

