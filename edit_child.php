<?php
// Database configuration
$servername = "localhost";
$username = "u730763858_sponsor";
$password = "0773196657Myco";
$dbname = "u730763858_sponsor";

// Create a reusable function to establish a database connection
function connectToDatabase() {
    global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Function to get child information by ID
function getChildById($childId) {
    $conn = connectToDatabase();
    $stmt = $conn->prepare("SELECT id, name, age, image, biography, location FROM children WHERE id = ?");
    $stmt->bind_param("i", $childId);
    $stmt->execute();
    $result = $stmt->get_result();
    $child = ($result->num_rows > 0) ? $result->fetch_assoc() : null;
    $stmt->close();
    $conn->close();

    return $child;
}

// Initialize variables
$selectedChild = null;

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selectChild'])) {
    $childId = $_POST['child_id'];
    $selectedChild = getChildById($childId);
}

// Update child information
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $conn = connectToDatabase();

    $childId = $_POST['child_id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $biography = $_POST['biography'];
    $location = $_POST['location']; // Added location field

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("UPDATE children SET name=?, age=?, biography=?, location=? WHERE id=?");
    $stmt->bind_param("sissi", $name, $age, $biography, $location, $childId);

    if ($stmt->execute()) {
        echo "Child information updated successfully!";
    } else {
        echo "Error updating child information: " . $conn->error;
    }

    $stmt->close();

    // Handle image upload if a new image is selected
    if ($_FILES['image']['size'] > 0) {
        $image = $_FILES['image'];
        $imageFileName = $childId . '_' . $image['name'];
        $targetDir = 'uploads/';

        // Upload the new image
        move_uploaded_file($image['tmp_name'], $targetDir . $imageFileName);

        // Update the image filename in the database
        $stmt = $conn->prepare("UPDATE children SET image=? WHERE id=?");
        $stmt->bind_param("si", $imageFileName, $childId);

        if ($stmt->execute()) {
            echo "Image updated successfully!";
        } else {
            echo "Error updating image: " . $conn->error;
        }

        $stmt->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Edit Child - MST Child Sponsorship</title>
</head>

<body class="bg-light">
    <div class="container mt-4">
        <h2 class="text-center mb-5 pt-4">Edit Child Information</h2>

        <!-- Child Selection Form -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="childSelect">Select Child:</label>
                <select class="form-control" id="childSelect" name="child_id" required>
                    <?php
                    // Fetch all children for listing
                    $conn = connectToDatabase();
                    $sql = "SELECT id, name FROM children";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                    }

                    $conn->close();
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="selectChild">Select Child</button>
        </form>

        <?php if ($selectedChild): ?>
            <!-- Child Edit Form -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="child_id" value="<?php echo $selectedChild['id']; ?>">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $selectedChild['name']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="number" class="form-control" id="age" name="age" value="<?php echo $selectedChild['age']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="biography">Biography:</label>
                    <textarea class="form-control" id="biography" name="biography" rows="4" required><?php echo $selectedChild['biography']; ?></textarea>
                </div>
                <!-- Added location field -->
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" class="form-control" id="location" name="location" value="<?php echo $selectedChild['location']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="image">New Image:</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary" name="update">Update Information</button>
            </form>
        <?php endif; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
