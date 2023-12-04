<?php
$servername = "localhost";
$username = "u730763858_sponsor";
$password = "0773196657Myco";
$dbname = "u730763858_sponsor";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get donor information from the URL parameters
$childName = $_GET['child_name'];
$childId = $_GET['child_id'];
// Add more parameters as needed

// You should validate and sanitize the input data before using it in a query to prevent SQL injection.

// Insert donor details into the database
$sql = "INSERT INTO donations (child_name, child_id) VALUES ('$childName', $childId)";
if ($conn->query($sql) === TRUE) {
    echo "Donation details saved successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
