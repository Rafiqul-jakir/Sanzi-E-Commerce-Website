<?php
   include("config.php");

   session_start();


   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // email and password sent from form 
      
      $myadminemail = $_POST['admin_email'];
      $mypassword = $_POST['admin_password'];
      
      $sql = "SELECT admin_email FROM admin_login WHERE admin_email='$myadminemail' AND admin_pass='$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      // $active = $row['Name'];
      $count = mysqli_num_rows($result);
      
		
      if($count == 1) {
         $_SESSION['login_admin'] = $myadminemail;
         
         header("location: ../../admin.php");
      }else {
        header("location: error.php");
      }
   }
?>