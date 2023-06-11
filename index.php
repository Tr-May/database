<?php
$dsn = "mysql:host=localhost;dbname=ecommerce_db";
$username = "root";
$password = "";
$conn = new PDO($dsn, $username, $password);

// Execute a query
$sql = "SELECT name,email FROM customers";
$result = $conn->query($sql);

// Fetch the result set
echo "<table border=1>";
echo "<tr>";
echo "<th>Name</th>";
echo "<th>Email</th>";

echo "</tr>";
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
  echo "<tr>";
  echo "<td>" . $row["name"] . "</td>";
  echo "<td>" . $row["email"] . "</td>";
  echo "</tr>";
}
echo "</table>";

// Close the connection
$conn = null;
?>
