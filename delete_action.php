<?php

  session_start();
  $db = mysqli_connect("localhost","root","root","Address_Book");
  
    $id=$_GET['id'];


        $sql = "DELETE FROM add_book WHERE ContactNo = '$id'";
        $result = mysqli_query($db, $sql) or die(mysqli_error($db));

         header("Location: address_book.php");
?>
