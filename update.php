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


      <?php
              $conn = new mysqli("localhost", "root", "root", "Address_Book");
              $UID=$_SESSION['username'];

              $ID = $_GET['uid'];

              $ne = $ID;

              echo "Contact Book Of ";
              echo $_SESSION['username'].'<br><br>' ;
    ?>
  <br>

<div id="center">

        <form name="upda" method="post" action="update.php">
          <div id="center1">
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
          </div>
            <input type="submit" id="ubtn" name="upda"value=" submit">
      </form>
</div>

</body>
</html>
