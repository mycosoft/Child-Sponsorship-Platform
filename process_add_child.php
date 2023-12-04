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

// Get form data
$name = $_POST['name'];
$age = $_POST['age'];
$biography = $_POST['biography']; // Add this line to retrieve biography

// File upload handling
$targetDir = "uploads/";
$targetFile = $targetDir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if image file is a valid image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($targetFile)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Allow certain file formats
if (!in_array($imageFileType, array("jpg", "jpeg", "png", "gif"))) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    // Attempt to move uploaded file
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";

        // Insert new child into the database with biography
        $imageFilename = basename($_FILES["image"]["name"]);
        $sql = "INSERT INTO children (name, age, image, biography) VALUES ('$name', $age, '$imageFilename', '$biography')";
        if ($conn->query($sql) === TRUE) {
            echo " Child added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$conn->close();
?>
