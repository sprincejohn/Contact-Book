<?php
    session_start();
    $rec = $_POST['rec'];                                                         //Passed Variable from ajax


    $json = array();                                                              //declaring an array
    $UID=$_SESSION['username'];
    $conn = new mysqli("localhost", "root", "root", "Address_Book");              //Database connectivity

    $vid = $_SESSION['lstmsg'];

    $sql = " SELECT ChatBot.id,ChatBot.Sender,ChatBot.Reciever,ChatBot.Chat_Text
    FROM ChatBot WHERE Sender = '$rec' AND Reciever = '$UID' AND id > '$vid' ";       //Query to display the message,the last send message
    $rest = $conn->query($sql);

    while($rowd = $rest->fetch_assoc()) {

      $bus = $rowd['Chat_Text'];
      $json[] = $bus;
      $vid = $rowd['id'];
    }

    $_SESSION['lstmsg'] = $vid;

    $jsonstring = json_encode($json);                                              // returning the array via json
    echo $jsonstring;
