<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Sponsor Form</title>
    
      <script>
        function redirectToFlutterwave(childName, childId) {
            // Define the Flutterwave donation URL with the required parameters
            var flutterwaveURL = 'https://flutterwave.com/donate/wasn4of7gwub?child_name=' + encodeURIComponent(childName) + '&child_id=' + childId;

            // Open a new window with the Flutterwave donation URL
            window.open(flutterwaveURL, '_blank');
        }
    </script>

    
</head>
<body class="bg-light" style="background-color: #f3f0e9 !important;">
    <div class="container mt-4">
        <h4 class="text-center mb-4 mt-5">Thank you for choosing to sponsor</h4>
  <!-- Child Information Card -->
 <div class="card mb-4 text-center col-md-6 mx-auto"> <!-- Adjusted width -->
    <div class="card-body text-center">
        <?php
        // Retrieve the selected child's name from the query parameter
        $selectedChildName = htmlspecialchars($_GET['childName']);

        // Database connection
        $servername = "localhost";
        $username = "u730763858_sponsor";
        $password = "0773196657Myco";
        $dbname = "u730763858_sponsor";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve the selected child's image from the database
        $sql = "SELECT image FROM children WHERE name = '$selectedChildName' LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $imageFilename = $row['image'];

            // Display circular image with the selected child's name below and centered
            echo '
                <div class="d-flex flex-column align-items-center">
                    <div class="mb-3">
                        <img src="uploads/' . $imageFilename . '" class="rounded-circle" alt="Child Image" width="200" height="200">
                    </div>
                    <div>
                        <h4 style="font-size: 28px; color: green;">' . $selectedChildName . '</h4>
                    </div>
                </div>';
        } else {
            echo "Child not found.";
        }

        $conn->close();
        ?>
        <div class="card-body">
            <!-- Text with increased font size -->
            <p class="card-text" style="font-size: 20px;">Child Sponsorship Plan</p>

            <!-- Button with increased size -->
            <button type="button" class="btn btn-primary btn-lg">$40 Monthly</button>
        </div>
    </div>
</div>




        <!-- Contact Information Form -->
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">CONTACT INFORMATION</h4>
                        <form>
                           <form>
                            <!-- Child Information -->
                            <div class="form-group">
                                <label for="childPicked">Child Picked</label>
                                <input type="text" class="form-control" id="childPicked" value="<?php echo htmlspecialchars($_GET['childName']); ?>" readonly>
                            </div>
                            <!-- Contact Information -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="firstName">First Name*</label>
                                    <input type="text" class="form-control" id="firstName" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastName">Last Name*</label>
                                    <input type="text" class="form-control" id="lastName" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address*</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <div class="form-group">
                                <label for="phoneNumber">Phone Number</label>
                                <input type="tel" class="form-control" id="phoneNumber">
                            </div>
                        </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mailing Address Form -->
        <div class="row mt-4">
            <div class="col-md-6 mx-auto">
               <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">MAILING ADDRESS</h4>
                        <form>
                            <form>
                            <!-- Mailing Address fields here -->
                            <div class="form-group">
                                <label for="country">Country*</label>
                                <select class="form-control" id="country" required>
                                    <option value="uganda">Uganda</option>
                                    <option value="kenya">Kenya</option>
                                    <option value="tanzania">Tanzania</option>
                                    <option value="burundi">Burundi</option>
                                    <option value="rwanda">Rwanda</option>
                                    <option value="usa">United States</option>
                                    <!-- Add more countries as needed -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="street">Street Address*</label>
                                <input type="text" class="form-control" id="street" required>
                            </div>
                            <div class="form-group">
                                <label for="city">City*</label>
                                <input type="text" class="form-control" id="city" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="state">State*</label>
                                    <input type="text" class="form-control" id="state" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="zip">ZIP Code*</label>
                                    <input type="text" class="form-control" id="zip" required>
                                </div>
                            </div>

                          
                            
                        </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Continue Payment Button -->
        <div class="row mt-4">
            <div class="col-md-6 mx-auto">
                <button type="button" class="btn btn-primary btn-block mb-5" onclick="redirectToFlutterwave('ChildName', 123)">Continue Payment</button>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
