<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel</title>
  <link rel="stylesheet" href="styles.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body>
	<div class="container">
  <h1><center>Admin Panel</center></h1>
  <h2><center>People who reached out</center></h2>

  <?php

  // Set database credentials
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "formdb";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Construct an SQL query to select all users from the database
  $sql = "SELECT * FROM formTable";

  // Execute the query
  $result = mysqli_query($conn, $sql);

  // // Check if the query returned any rows
  if (mysqli_num_rows($result) > 0) {
?>
<!-- Display the user data in an HTML table -->
  <table class="table" style=" background-color:white; border-radius:10px; width:100%;">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">First Name</th>
				<th scope="col">Last Name</th>
				<th scope="col">Email</th>
				<th scope="col">Phone Number</th>
				<th scope="col">Message</th>
			</tr>
		</thead>
		<tbody>
    <?php  
		while($row = mysqli_fetch_assoc($result)) {
		?>
    <tr scope="row">
			<td>
				<?php echo $row["Id"];?>
			</td>
			<td><?php echo $row["firstName"];?>
			</td>
			<td><?php echo $row["lastName"];?>
			</td>
			<td><?php echo $row["email"];?>
			</td>
			<td>
				<?php echo $row["phone"];?>
			</td>
			<td>
				<?php echo $row["messages"];?>
			</td>
		</tr>
    <?php }?>
  </table>

  <?php
	}
	else {

    // Display an error message if no rows were returned
    echo "No users found.";

  }
	

  // Close connection
  mysqli_close($conn);

  ?>

  <a href="./index.html">
		<button>Logout</button>
	</a>
</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>
