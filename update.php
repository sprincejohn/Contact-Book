<?php
    session_start();
    include_once('update_action.php');
    include_once('update_validate.js');

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css\style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js\update_validate.js"></script>
</head>
<body>

  <h3 id="h">
     <?php
          if ($Err != "") {
              echo  $Err;
         }
     ?>
  </h3>


    <h1> <u> Modify Contacts </u> <h1>

  <a href="address_book.php">Go Back </a>
<br><br>
  <table id="myTable1" name="contact" border ="1" align = "center" style="line-height:25px";>

    <tr>
        <th>Contact No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
    </tr>

      <?php
              $conn = new mysqli("localhost", "root", "root", "Address_Book");
              $UID=$_SESSION['username'];

              $ID = $_GET['uid'];

              $ne = $ID;

              echo "Contact Book Of ";
              echo $_SESSION['username'].'<br><br>' ;




              $sql= "SELECT add_book.ContactNo,add_book.Name,add_book.Email,add_book.Phone FROM add_book WHERE Username = '$UID' AND ContactNo = '$ID'";

              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    ?>

                    <tr>
                        <td><?php echo $row['ContactNo']; ?></td>
                        <td><?php echo $row['Name']; ?></td>
                        <td><?php echo $row['Email']; ?></td>
                        <td><?php echo $row['Phone']; ?></td>
                    </tr>


                     <?php

                  }
              }
              else {
                  echo "O results";
                ?>

                <?php
              }
      ?>
  </table>
  <br>

<div id="button1">

        <form name="upda" method="post" action="update.php">

            <table>
              <tr>
                 <td id="mid"></td>
                 <td><input type="hidden" name="ContactNo" value="<?php echo $ne;  ?>"</td>
             </tr>
               <tr>
                  <td id="mid"> Name:</td>
                  <td><input type="text" name="Name" value="<?php echo isset($_POST["Name"]) ? $_POST["Name"] : ''; ?>"</td>
              </tr>
              <tr>
                 <td id="mid"> Email:</td>
                 <td><input type="text" name="Email" value="<?php echo isset($_POST["Email"]) ? $_POST["Email"] : ''; ?>"</td>
              </tr>
              <tr>
                <td id="mid"> Phone:</td>
                <td><input type="text" name="Phone" value="<?php echo isset($_POST["Phone"]) ? $_POST["Phone"] : ''; ?>"</td>
              </tr>
            </table>

            <input type="submit" id="ubtn" name="upda"value=" submit">
      </form>
</div>

</body>
</html>
