<?php
include "db_conn.php";

if (isset($_POST["submit"])) {
  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $email = $_POST["email"];
  $gender = $_POST["gender"];

  //execute query
  $sql = "INSERT INTO `crud` VALUES (NULL,'$first_name','$last_name','$email','$gender')";
  $result = mysqli_query($conn, $sql);

  // process the result
  if ($result) {
    header("Location: index.php?msg=added");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  </head>
  <body>
    
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #1E375A;color:white;">
          PHP Complete CRUD Application
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Add New User</h3>
            <p class="text-muted">Complete the form below to add a new user</p>
        </div>

        <!-- form section  -->
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw;min-width:300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">First Name:</label>
                        <input type="text" class="form-control" name="first_name">
                    </div>

                    <div class="col">
                        <label class="form-label">Last Name:</label>
                        <input type="text" class="form-control" name="last_name">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email">
                </div>

                <div class="form-group mb-3">
                    <label>Gender:</label>
                    <!-- &nbsp; -->
                    <input type="radio" class="form-check-input mx-2" name="gender" id="male" value="male">
                    <label for="male" class="form-input-label">Male</label>
                    <!-- &nbsp; -->
                    <input type="radio" class="form-check-input" name="gender" id="female" value="female">
                    <label for="female" class="form-input-label">Female</label>
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Save</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>