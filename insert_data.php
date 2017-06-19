<?php
  session_start();
  $_SESSION['username'] ;
  include_once('insert_data_validate.js');
  include_once('insert_data_action.php');
 ?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href = "css\style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js\insert_data_validate.js"></script>
</head>
  <body>
    <h3 id="h">
       <?php
            if ($Err != "") {
                echo  $Err;
           }
       ?>
    </h3>

    <div id="center">
            <h1> <u>Add New Contact</u> <h1>


                <h4> <?  echo $_SESSION['username'] ;?> </h4>

            <form name="ins" action="insert_data.php" method="post">
                <div id="center1">
                      <table>
                        <tr>
                          <td>Name:</td>
                          <td><input type = "text" name = "Name"  value="<?php echo isset($_POST["Name"]) ? $_POST["Name"] : ''; ?>" </td>
                        </tr>

                        <tr>
                          <td>Email:</td>
                          <td><input type = "email" name = "Email"  value="<?php echo isset($_POST["Email"]) ? $_POST["Email"] : ''; ?>" </td>
                        </tr>

                        <tr>
                          <td>Phone:</td>
                          <td><input type="text" name = "Phone"    value="<?php echo isset($_POST["Phone"]) ? $_POST["Phone"] : ''; ?>" </td>
                        </tr>
                    </table>
                </div>
                <input type="submit" id="btn" name="insert" value="ADD">
         </form>
    </div>

 </body>
 </html>
