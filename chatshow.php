<?php
  session_start();
  $UID=$_SESSION['username'];
  $rec = $_SESSION['reciever'];
  $conn = new mysqli("localhost", "root", "root", "Address_Book");
  $ql = "SELECT ChatBot.Sender,ChatBot.Reciever,ChatBot.Chat_Text FROM ChatBot WHERE Sender = '$UID' AND Reciever = '$rec'";
  $result = $conn->query($ql);
  $rql = "SELECT ChatBot.Sender,ChatBot.Reciever,ChatBot.Chat_Text FROM ChatBot WHERE Sender = '$rec' AND Reciever = '$UID'";
  $res = $conn->query($rql);

 ?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css\style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="js\addrs_book.js"></script>
</head>
<body>

<div id="chatbox">
  <div id="chatscreen">

        <?php
        echo "Message to " .$rec;

          if ($result->num_rows > 0 && $res->num_rows > 0 ) {
          while(($row = $result->fetch_assoc()) && ($rowd = $res->fetch_assoc())) {

          ?>

          <div id="chat_data">
            <span><?php echo $row['Sender'].": ";?></span>
              <span><?php echo $row['Chat_Text']."<br>"; ?></span>
            </div>
            <div id="chat_data_Reciever">
            <span> <?php echo $row['Reciever'].": ";?></span>
              <span> <?php echo $rowd['Chat_Text']."<br>"; ?></span><br>
            </div>
            <?php
             }
           }
         ?>
  </div>
  <div id="chatype">
                <input type="text" id="chatInput" name="text_chat" placeholder="Write the message here..."/>
                <input type="hidden" id="DestinationUser" name="bta">
          </div>

</div>

</body>
</html>
