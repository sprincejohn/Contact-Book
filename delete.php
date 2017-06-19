<?php
    session_start();
    include_once('delete_action.php');

 ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css\style.css">
</head>
<body>
  <h3 id="h">
     <?php
          if ($Err != "") {
              echo  $Err;
         }
     ?>
  </h3>


    <h1> <u> Delete Contacts </u> <h1>

  <a href="address_book.php">Go Back </a>
<br><br>

  <table id="myTable" name="contact" border ="1" align = "center" style="line-height:25px";>

    <tr>
        <th>Contact Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>

    </tr>

    <?php
      $conn = new mysqli("localhost", "root", "root", "Address_Book");
      echo "Contact Book Of ";
      echo $_SESSION['username'].'<br><br>' ;


      $UID=$_SESSION['username'];

      $sql= "SELECT add_book.ContactNo,add_book.Name,add_book.Email,add_book.Phone FROM add_book WHERE Username = '$UID'";

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


  <div id="button1">

          <form method="post" action="delete.php">

          <table>
              <tr>
               <td id="mid">ContactNo:</td>
               <td><input type="text" name="ContactNo" value="<?php echo isset($_POST["ContactNo"]) ? $_POST["ContactNo"] : ''; ?>"</td>
              </tr>
           </table>
            <input type="submit" name="del"value="Delete This Contact">
        </form>
  </div>
</body>
</html>
