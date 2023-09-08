<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the title, description, price, and image information from the form
  $title = $_POST["Title"];
  $description = $_POST["Description"];
  $price = $_POST["Price"];
  $image = $_FILES["image"];
  $selected_option = $_POST["quantity_select"];

  // Check if an image was uploaded
  if ($image["name"]) {
    // Define the path to save the image
    $target_dir = "assets/product_img/";
    $target_file = $target_dir . basename($image["name"]);

    // Check if the file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
    } else {
      // Save the image to the specified path
      if (move_uploaded_file($image["tmp_name"], $target_file)) {
        $conn = mysqli_connect("localhost", "root", "", "sanzi");

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        // Insert the information into a table
        $sql = "INSERT INTO `all_products`(`Product_title`, `Product_description`, `image`, `Product_Price`, `Product_Quantity`) VALUES ('$title','$description','$target_file','$price','$selected_option')";

        if ($conn->query($sql) === TRUE) {
          header("Location: admin.php");
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
  } else {
    echo "Please select an image.";
  }
}
?>

