<?php
    session_start();

    $rec = $_POST['rec'];                                                           // Passed variables
    $text = $_POST['sendmsg'];

    $_SESSION['reciever'] = $rec;
    $_SESSION['textmsg'] = $text;

      $val=$_SESSION['username'];
      $db = mysqli_connect("localhost","root","root","Address_Book");               //Database conncectivity

      $query = "INSERT INTO ChatBot (Sender,Reciever,Chat_Text) VALUES ('$val','$rec','$text')";        // Query to insert the message to the db
      $result = mysqli_query($db,$query);

      if($result){
          $response_array['status'] = 'success';
      }else {
          $response_array['status'] = 'error';
      }

      header('Content-type: application/json');
      echo json_encode($response_array);
