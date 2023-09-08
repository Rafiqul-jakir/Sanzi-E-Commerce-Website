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
    session_start();

    $_SESSION["email"] = $email;
    $_SESSION["packege_name"] = $selected_option;

	// Validate user input
	if (!empty($name) && !empty($email) && !empty($password) && !empty($selected_option)) {
		// Insert user data into database
		$sql = "INSERT INTO `user_registration`(`Name`, `Email`, `Password`, `Packege`)  VALUES ('$name', '$email', '$password', '$selected_option')";
		mysqli_query($conn, $sql);

		// Redirect user to thank you page
		header("Location: ../../payment.php");
		exit;
	} else {
		echo "Please fill in all required fields.";
	}
}
?>
