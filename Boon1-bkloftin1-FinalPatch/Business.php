<?php
include("config.php");

function getAllBusinesses($db) {
    $businesses = array();
    
    $sql = "SELECT * FROM Business";
    $result = mysqli_query($db, $sql);
    
    while($row = mysqli_fetch_assoc($result)) {
        $businesses[] = $row;
    }
    
    return $businesses;
}

// Usage example
$businesses = getAllBusinesses($db);
foreach($businesses as $business) {
    echo "BusinessID: " . $business['BusinessID'] . " Name: " . $business['nameOfBusiness'] . " Type: " . $business['typeOfService'] . " description: " . $business['descriptionOfService']. " Email: " . $business['Email']. " PhoneNumber: " . $business['PhoneNumber']. "<br>";

}

// Close the database connection
