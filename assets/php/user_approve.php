<?php
    $conn = new mysqli('localhost','root','','sanzi');
    $user_id = $_GET['user_id'];

    $Email_account_approve = "SELECT Email FROM `account_approve` WHERE ID = '$user_id';";
    $Email_account_approve_Data = mysqli_query($conn,$Email_account_approve);
    $Email_row = mysqli_fetch_array($Email_account_approve_Data);
    $email = $Email_row['Email'];

    $Password_account_approve = "SELECT Password FROM `user_registration` WHERE Email = '$email'";
    $Password_account_approve_Data = mysqli_query($conn,$Password_account_approve);
    $Password_row = mysqli_fetch_array($Password_account_approve_Data);
    $Password = $Password_row['Password'];

    $sql = "INSERT INTO `login`(`Email`, `Password`) VALUES ('$email', '$Password')";
    mysqli_query($conn, $sql);

    $stmt = $conn->prepare("DELETE FROM `account_approve` WHERE ID = ?");
    $stmt->bind_param("s",$user_id);
    $stmt->execute();
    $stmt->close();


    $conn->close();

    header("Location: ../../admin.php");
?>