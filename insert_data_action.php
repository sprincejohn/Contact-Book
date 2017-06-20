<?php
  session_start();
  $val=$_SESSION['username'];



    if(isset($_POST["insert"])){

            $Name =  mysqli_real_escape_string['Name'];
            $Email =  mysqli_real_escape_string['Email'];
            $Phone =  mysqli_real_escape_string['Phone'];
            $flag = 0;

            $Err = "";


            if (empty($_POST["Name"])) {
                $Err = "Enter the Name.<br>";
            }

            if (empty($_POST["Email"])) {
                $Err = $Err."Email is required<br>";
              }
              else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                   $Err = $Err."Invalid email format<br>";
              }

            if (empty($_POST["Phone"])) {
                 $Err = $Err."Enter the phone number<br> ";
              }
            else if (strlen($_POST["Phone"]) < 10) {
                $Err = $Err."Phone Number less than 10..!<br>";
              }
            else if (strlen($_POST["Phone"]) > 10 ){
                $Err = $Err."Phone Number cannot be greater than 10..!<br>";
            }


            if ($Err == "") {
                  $val=$_SESSION['username'];
                  $flag = 0;

                  $db = mysqli_connect("localhost","root","root","Address_Book");
                  $query = "INSERT INTO add_book (Username,Name,Email,Phone,Chat) VALUES ('$val','$Name','$Email','$Phone','$flag' )";
                  mysqli_query($db,$query);
                  $index = mysqli_insert_id($db);
                  echo $index;
                  header("Location: address_book.php");
              }
    }
