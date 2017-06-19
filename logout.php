<?php
  session_start();
  if(isset($_POST["submit"])){                  //To check if the button log out is clicked
      $flag = 0;                                //If so the assign flag to 0
      session_destroy();                        //Session Terminate
      header("Location: login.php");            //ReDirect to the Log in page
    }
?>
