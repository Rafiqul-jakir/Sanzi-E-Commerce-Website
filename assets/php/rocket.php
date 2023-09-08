<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "sanzi");
session_start();
$email = $_SESSION["email"];
$packege_name = $_SESSION["packege_name"];
// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Collect form data
    if($packege_name == "BASIC"){
      $payable_tk = 200;
    }else if($packege_name == "STANDARD"){
      $payable_tk = 500;
    }else if($packege_name == "PREMIUM"){
      $payable_tk = 1000;
    }else{
      $payable_tk = "Blank";
    }

	$Rocket_Phone_Number = mysqli_real_escape_string($conn, $_POST["Rocket_Phone_Number"]);
	$Transaction_ID = mysqli_real_escape_string($conn, $_POST["Transaction_ID"]);



	// Validate user input
	if (!empty($email) && !empty($packege_name) && !empty($Rocket_Phone_Number) && !empty($Transaction_ID)) {
		// Insert user data into database
		$sql = "INSERT INTO `account_approve`(`Email`, `Packege`, `Ammout`, `Phone Number`, `Transaction_ID`,`Payment_method`) VALUES ('$email', '$packege_name', '$payable_tk', '$Rocket_Phone_Number','$Transaction_ID','Rocket')";
		mysqli_query($conn, $sql);
        session_destroy();
		$conn->close();
		// Redirect user to thank you page
		header("Location: ../../index.php");
		exit;
	} else {
		echo "Please fill in all required fields.";
	}
}
?>
