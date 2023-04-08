<?php
$fname =$_POST ['first-name'];
$lname =$_POST ['last-name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
echo $fname; 
echo $lname;
// echo $email; 
// echo $phone;
// echo $message;
/* Attempt MySQL server connection. Assuming you are running MySQL server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root","","formdb");
// Check connection
if($link === false) {
die("ERROR: Could not connect. ".mysqli_connect_error());
}
// Attempt insert query execution
$sql = "INSERT INTO formTable (firstName, lastName, email, phone, messages) VALUES ('$fname', '$lname','$email','$phone','$message')";
if(mysqli_query($link, $sql)){
	echo "Records added successfully.";
	// header("Location: index.html");
  // exit();
} else{
	echo "ERROR: Could not able to execute $sql. ".mysqli_error($link);
}
// Close connection
mysqli_close($link);
?>
