<?php
include "db_conn.php"; ?>

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

	<?php
 function showAlert($msg, $alert_type)
 {
   echo '<div class="alert ' .
     $alert_type .
     ' alert-dismissible fade show" role="alert">
        ' .
     $msg .
     '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
 }
 if (isset($_GET["msg"])) {
   $msg = $_GET["msg"];
   if ($msg == "added") {
     showAlert("User Added Successfully!", "alert-success");
   } elseif ($msg == "edited") {
     showAlert("Record Edited Successfully!", "alert-info");
   } else {
     showAlert("Record Deleted Successfully!", "alert-danger");
   }
 }
 ?>
        <a href="add_new.php" class="btn btn-dark mb-3">Add New</a>

        <table class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
			<?php
   $sql = "SELECT * FROM `crud`";
   $result = mysqli_query($conn, $sql);
   while ($row = mysqli_fetch_assoc($result)) { ?>
				<tr>
					<td><?php echo $row["id"]; ?></td>
					<td><?php echo $row["first_name"]; ?></td>
					<td><?php echo $row["last_name"]; ?></td>
					<td><?php echo $row["email"]; ?></td>
					<td><?php echo $row["gender"]; ?></td>
					<td>
						<a href="edit.php?id=<?php echo $row[
        "id"
      ]; ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
						<a href="delete.php?id=<?php echo $row[
        "id"
      ]; ?>" class="link-dark" onclick='return confirmDelete()'><i class="fa-solid fa-trash fs-5"></i></a>
					</td>
				</tr>
				<?php }
   ?>
			</tbody>
        </table>
    </div>

	<script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this record?");
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>