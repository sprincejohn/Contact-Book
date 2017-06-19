<?php
    session_start();                                                                 //session starting

    if(isset($_SESSION['username'])) {                                                //checking whether seesion is active
        $flag = 10;                                                                   //assign flag to if seesion username is active
    }
    else {
        header("Location:login.php");
    }
    include_once('logout.php');
    include_once('addrs_book.js');
    $rec = $_SESSION['reciever'];
    $vid = $_SESSION['lstmsg'];
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css\style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js\addrs_book.js"></script>
  </head>
  <body>

  <h1> Address Book </h1>
  <div id="login">
    <div id="left">

      <form method="post" action="logout.php">
          <input type="submit" id="btn" name="submit" value="Log Out">
      </form>
      <br><a href="insert_data.php"> Add New Contact </a>

    </div>
  </div>

  <table id="myTable" name="contact" border ="1" align = "left" style="line-height:25px";>  <!--table for displaying the contat information -->
      <tr>
          <th>Contact Id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>Actions</th>
          <th> Status  </th>
      </tr>

      <?php

          $conn = new mysqli("localhost", "root", "root", "Address_Book");                          //Database connectivity
          echo "Contact Book Of ";
          echo $_SESSION['username'].'<br><br>' ;
          $UID=$_SESSION['username'];

          $sql= "SELECT add_book.ContactNo,add_book.Name,add_book.Email,add_book.Phone FROM add_book WHERE Username = '$UID'";   //Mysql query to display the Contact
          $results = $conn->query($sql);

          if ($results->num_rows > 0) {
            while($row = $results->fetch_assoc()) {

      ?>

      <tr>
        <td><?php echo $row['ContactNo']; ?></td>
        <td><?php echo $row['Name']; ?></td>
        <td><?php echo $row['Email']; ?></td>
        <td><?php echo $row['Phone']; ?></td>
        <td>
            <?php
                $id = $row['ContactNo'];
                $name = $row['Name'];

                echo '<a href="update.php?uid= ' .$id. '"] onclick="update_action.php" target="blank"> Edit  </a><br>';
                echo '<a href="delete_action.php?id= ' .$id. '"> Delete   </a>';
            ?>

        </td>
        <td>
            <?php
                if(!$flag = 0){
            ?>
            <button id="showbtn"> Chat </button>
            <?php
                }
                else {
            ?>
            <p> Offline </p>
            <?php
                }
            ?>
        </td>
        </tr>

        <?php
           }
          }
          else {
              echo "O results";
          }
      ?>
  </table>

  <?php
    $UID=$_SESSION['username'];
    $rec = $_SESSION['reciever'];

    $conn = new mysqli("localhost", "root", "root", "Address_Book");

    $ql = "SELECT Sender,Reciever,Chat_Text FROM ChatBot WHERE Sender = '$UID' AND Reciever = '$rec' ";           //Query to display Sender's View
    $result = $conn->query($ql);

    $rql = "SELECT id,Sender,Reciever,Chat_Text FROM ChatBot WHERE Sender = '$rec' AND Reciever = '$UID' ";        //Query to display Reciever's View
    $res = $conn->query($rql);
  ?>
  <div id="chatbox">
    <div id="chatscreen">
        <h5><?php echo $rec;?></h5>
        <?php
            if ($result->num_rows > 0 &&  $res ->num_rows > 0) {
               while(($row = $result->fetch_assoc()) && $rowd = $res->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $row['Sender'].": ";?></td>
                <td><?php echo $row['Chat_Text']."<br>"; ?></td>
            <tr>

            <tr>
                <td> <?php echo $rowd['Sender'].": ";?></td>
                <td> <?php echo $rowd['Chat_Text'].'<br>'; ?></td><br>
            <tr>
            <?php $vid = $rowd['id'];
              }
              $_SESSION['lstmsg'] = $vid;
            }
        ?>
    </div>
    <div id="chatype">
        <input type="text" id="chatInput" name="text_chat" placeholder="Write the message here..."/>
        <input type="hidden" id="DestinationUser" name="bta">
    </div>
  </div>
  </body>
</html>                                                                                                        <!-- END OF PROGRAM -->
