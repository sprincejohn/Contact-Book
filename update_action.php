<?php
  session_start();
 $id = $_GET[ID];
 echo $id;
  $db = mysqli_connect("localhost","root","root","Address_Book");

     if(isset($_POST["upda"])){


       $ID = $_POST['ContactNo'];
       $Name = $_POST['Name'];
       $Email = $_POST['Email'];
       $Phone = $_POST['Phone'];

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

        $sql ="UPDATE add_book SET Name = '$Name', Email='$Email', Phone='$Phone' WHERE ContactNo = '$ID'";
         $result =  mysqli_query($db,$sql);

         header("Refresh:1");
        header("Location: address_book.php");
      }
    }
 ?>
