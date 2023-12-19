<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <title>Delete Child - MST Child Sponsorship</title>
</head>
<body class="bg-light">
    <div class="container mt-4">
        <h2 class="text-center mb-5 pt-4">Delete Child</h2>

        <!-- Alert for Success Message -->
        <div id="successAlert" class="alert alert-success alert-dismissible fade" role="alert">
            <span id="successMessage"></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <!-- Card Wrapper -->
        <div class="card">
            <div class="card-body">

                <!-- Child List Table -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Your PHP code to fetch and display child records in the table
                        // Replace this part with your actual code
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

                        // Fetch and display child records
                        $sql = "SELECT id, name, age FROM children";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>{$row['id']}</td>
                                        <td>{$row['name']}</td>
                                        <td>{$row['age']}</td>
                                        <td><a href='javascript:void(0);' onclick='deleteChild({$row['id']})'>Delete</a></td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No records found</td></tr>";
                        }

                        $conn->close();
                        ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function deleteChild(childId) {
        // Confirm deletion
        var confirmDelete = confirm("Are you sure you want to delete this child?");
        
        if (confirmDelete) {
            // Use AJAX to send the delete request
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'process_delete_child.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            // Handle the response
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Display success alert using Bootstrap
                    var successAlert = document.createElement('div');
                    successAlert.className = 'alert alert-success mt-3';
                    successAlert.style.maxHeight = 'none';  // Remove max height restriction
                    successAlert.innerText = 'Child deleted successfully!';

                    // Insert the alert at the top of the body
                    document.body.insertBefore(successAlert, document.body.firstChild);

                    // Optionally, you can remove the alert after a few seconds
                    setTimeout(function () {
                        successAlert.remove();
                    }, 4000);

                    // Auto-refresh the page after a successful deletion
                    location.reload();

                    // Optionally, you can perform other actions here
                }
            };

            // Send the request with the child ID
            xhr.send('id=' + childId);
        }
    }
</script>





</body>
</html>
