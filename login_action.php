<?php
    $db = mysqli_connect("localhost","root","root","Address_Book");
    session_start();
    if (isset($_POST["submit"])){
        session_start();
        $Username = $_POST['Username'];
        $Password = $_POST['Password'];
        $Err = "";
        $query = "SELECT * FROM account WHERE Username='$Username' and Password='$Password'";
        $result = mysqli_query($db, $query) or die(mysqli_error($db));

        $val =  mysqli_fetch_array($result);
        if(!empty($_POST["Username"]) && !empty($_POST["Password"])){

            if ($val){

                session_start();
                $_SESSION['username']=$_POST['Username'];

                $UID=$_SESSION['username'];
                $_SESSION['time'] =  $_SERVER['REQUEST_TIME'] ;
                $tim = $_SESSION['time'];
                $db = mysqli_connect("localhost","root","root","Address_Book");
                $sql = "INSERT INTO ChatBot (Username, Chat_Time) VALUES ('$UID,$tim')";
                mysqli_query($db,$sql);


                header("Location: address_book.php");

              }
            else{
                $Err = "Invalid Login Credentials.Please try again..!";
            }
        }

        else{
          $Err = "Please enter the required fields..!";
        }




    }
