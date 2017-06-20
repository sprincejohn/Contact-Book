<?php
  echo "helloooooo...!!";
  $UID=$_SESSION['username'];
  $rec = $_SESSION['reciever'];

  $conn = new mysqli("localhost", "root", "root", "Address_Book");

  $ql = "SELECT Sender,Reciever,Chat_Text FROM ChatBot WHERE Sender = '$UID' AND Reciever = '$rec' ";           //Query to display Sender's View
  $result = $conn->query($ql);

  $rql = "SELECT id,Sender,Reciever,Chat_Text FROM ChatBot WHERE Sender = '$rec' AND Reciever = '$UID' ";        //Query to display Reciever's View
  $res = $conn->query($rql);
