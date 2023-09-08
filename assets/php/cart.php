<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "sanzi");

// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Collect form data
	$name = mysqli_real_escape_string($conn, $_POST["Name"]);
	$email = mysqli_real_escape_string($conn, $_POST["Email"]);
	$password = mysqli_real_escape_string($conn, $_POST["Password"]);
    $selected_option = $_POST["my_select"];
}
?>