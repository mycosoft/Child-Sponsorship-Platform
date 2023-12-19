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

// Check if 'id' is set in the POST data
if (isset($_POST['id'])) {
    $childId = $_POST['id'];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM children WHERE id = ?");
    $stmt->bind_param("i", $childId);

    if ($stmt->execute()) {
        echo "Child deleted successfully!";
    } else {
        echo "Error deleting child: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error: 'id' not set in POST data.";
}

$conn->close();
?>
