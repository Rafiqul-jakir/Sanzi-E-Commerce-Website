<?php
   include("config.php");

   session_start();


   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // email and password sent from form 
      
      $mycontroleremail = $_POST['controler_email'];
      $mypassword = $_POST['controler_password'];
      
      $sql = "SELECT `controler_email`  FROM `controler_login` WHERE controler_email='$mycontroleremail' AND controler_pass='$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      
		
      if($count == 1) {
         $_SESSION['login_controler'] = $mycontroleremail;
         
         header("location: ../../control_panel.php");
      }else {
        header("location: error.php");
      }
   }
?>