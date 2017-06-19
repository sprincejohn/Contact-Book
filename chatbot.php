<?php
    session_start();

    $rec = $_POST['rec'];                                                           // Passed variables
    $text = $_POST['sendmsg'];

    $_SESSION['reciever'] = $rec;
    $_SESSION['textmsg'] = $text;


      $val=$_SESSION['username'];
      $db = mysqli_connect("localhost","root","root","Address_Book");               //Database conncectivity

      $query = "INSERT INTO ChatBot (Sender,Reciever,Chat_Text) VALUES ('$val','$rec','$text')";        // Query to insert the message to the db
      mysqli_query($db,$query);
