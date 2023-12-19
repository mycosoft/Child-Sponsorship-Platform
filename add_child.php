<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Add Child - MST Child Sponsorship</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .center-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .custom-card {
            max-width: 700px;
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="center-container">
        <div class="card bg-light custom-card">
            <div class="card-body">
                <h2 class="card-title text-center">Add a New Child</h2>
                <form action="process_add_child.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input type="number" class="form-control" id="age" name="age" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Location:</label>
                        <input type="text" class="form-control" id="location" name="location" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" class="form-control-file" id="image" name="image" accept="image/jpeg, image/png" required>
                    </div>
                    <!-- New Biography Field -->
                    <div class="form-group">
                        <label for="biography">Biography:</label>
                        <textarea class="form-control" id="biography" name="biography" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Add Child</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
