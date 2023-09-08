<?php
$conn = new mysqli('localhost','root','','sanzi');

$product_title = $_GET['product_title'];
$stmt = $conn->prepare("DELETE FROM `all_products` WHERE Product_title = ?");
$stmt->bind_param("s",$product_title);
$stmt->execute();
$stmt->close();
$conn->close();

header("Location: ../../admin.php");
?>