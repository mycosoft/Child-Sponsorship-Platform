<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    
    <title>MST Child Sponsorship </title>
</head>
<body class="bg-success">

    <div class="container mt-4">
        <div class="row">
            <?php generateChildCards(); ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</body>
</html>

<?php 
    error_reporting(E_ALL);
ini_set('display_errors', 1);  ?>

<?php
function generateChildCards() {
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

    $sql = "SELECT id, name, age, image, biography FROM children LIMIT 16"; // Limit the query to fetch only four children
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '
            <div class="col-md-3 mb-4">
                        <div class="card">
                            <img src="uploads/' . $row["image"] . '" class="card-img-top" alt="' . $row["name"] . '">
                            <div class="card-body">
                                <h5 class="card-title">' . $row["name"] . '</h5>
                                <p class="card-text">Age: ' . $row["age"] . ' years</p>
                                <p class="card-text">' . $row["biography"] . '</p>
                                <button class="btn btn-primary" onclick="sponsorChild(' . $row["id"] . ')">Sponsor</button>
                            </div>
                        </div>
                    </div>';
        }
    } else {
        echo "0 results";
    }

    $conn->close();
}
?>