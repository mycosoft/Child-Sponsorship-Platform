<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>List Children - MST Child Sponsorship </title>

    <style>
        /* Custom CSS for modal header and footer with gradient border lines */
        .modal-header {
            border-bottom: 6px solid;
            border-image: linear-gradient(to right, yellow, green, lightgreen, blue);
            border-image-slice: 1;
        }

        .modal-footer {
            border-top: 6px solid;
            border-image: linear-gradient(to right, yellow, green, lightgreen, blue);
            border-image-slice: 1;
        }

        /* Circular mask for images in modal header */
        .modal-header img {
            border-radius: 50%;
            border: 2px solid white;
            width: 95px; /* Adjust size as needed */
            height: 95px; /* Adjust size as needed */
        }

        /* Increase the size of the modal */
        .modal-content {
            width: 100%;
            margin: auto;
        }

       
    </style>
</head>

<body class="bg-success">

    <div class="container mt-4">
        <h2 class="text-center mb-5 pt-4" style="color:white;">Children List</h2>
        <div class="row">
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

            $sql = "SELECT id, name, age, image, biography, location FROM children";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                        <div class="col-md-3 mb-4">
                            <div class="card text-center">
                                <img src="uploads/' . $row["image"] . '" class="card-img-top rounded-circle mx-auto mt-2" alt="' . $row["name"] . '" style="width: 200px; height: 200px;">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <h5 class="card-title font-weight-bold">' . $row["name"] . '</h5>
                                    <p class="card-text">Age: ' . $row["age"] . ' years</p>
                                    <a href="#" data-toggle="modal" data-target="#biographyModal' . $row["id"] . '">Brief Story</a>

                                    <!-- Biography Modal -->
                                    <div class="modal fade" id="biographyModal' . $row["id"] . '" tabindex="-1" role="dialog" aria-labelledby="biographyModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <img src="uploads/' . $row["image"] . '" alt="' . $row["name"] . '">
                                                    <div class="text-center"><br>
                                                        <h5 class="modal-title ml-3">&nbsp;' . $row["name"] . '\'s Story</h5>
                                                        <p class="text-center text-success">&nbsp;Location: ' . $row["location"] . '</p>
                                                    </div>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>' . $row["biography"] . '</p>
                                                </div>
                                            <div class="modal-footer">
                                                <div class="mx-auto">
                                                   <button class="btn btn-primary" onclick="openSponsorForm(\'' . $row["name"] . '\', ' . $row["id"] . ')">Sponsor</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary mt-4 " onclick="openSponsorForm(\'' . $row["name"] . '\', ' . $row["id"] . ')">Sponsor</button>
                                </div>
                            </div>
                        </div>';
                }
            } else {
                echo "0 results";
            }

            $conn->close();
            ?>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function openSponsorForm(childName, childId) {
            // Open a new page with the form
            window.open('sponsor_form.php?childName=' + encodeURIComponent(childName) + '&childId=' + childId, '_blank');
        }
    </script>
</body>

</html>
