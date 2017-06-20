<?php

      session_start();
      $db = mysqli_connect("localhost","root","root","Address_Book");

      if(!$db )
      {
        echo "Not connected<br>";
      }
      if (mysqli_select_db($db))
      {
        echo "DB Not selected<br>";
      }

      if(isset($_POST["create"])){

              $Username =  mysqli_real_escape_string['Username'];
              $Email =  mysqli_real_escape_string['Email'];
              $Password =  mysqli_real_escape_string['Password'];

              $Err = "";
                $db = mysqli_connect("localhost","root","root","Address_Book");
                $dq = "SELECT Username FROM account WHERE Username = '$Username'" ;
                $dupli= mysqli_query($db,$dq);
                $res = mysqli_num_rows($dupli);
                if($res > 0){
                    $Err = "Username Already Used.";
                    }


              if(empty($_POST["Username"])) {
                  $Err = $Err."Username is required<br>";
              }

              if (empty($_POST["Email"])) {
                  $Err = $Err."Email is required<br>";
                }
                else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                     $Err = "$Err"."Invalid email format<br>";
                }

              if (empty($_POST["Password"])) {
                   $Err = $Err."Enter the password<br> ";
                }
               else if (strlen($_POST["Password"]) < 8) {
                  $Err = $Err."Password should be min of 8 Character..!<br>";
                }
                else if (strlen($_POST["Password"]) > 15 ){
                  $Err = $Err."Password cannot be greater than 15..!<br>";
                }


                if ($Err == "") {
                    session_start();
                          $sql = "INSERT INTO account (Username,Email,Password) VALUES('$Username','$Email','$Password' )";
                          mysqli_query($db,$sql);

                          header("Location: address_book.php");

                }
}
