<?php
      session_start();
      include_once('validate.js');
      include_once('create_action.php');
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css\style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="js\validate.js"></script>
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
        <h1> <u>CREATE ACCOUNT</u> <h1>

          <form name="creta" method="post" action="create.php">
                  <div id="center1">

                      <table>
                          <tr>
                             <td>Username:</td>
                             <td><input type = "text" name = "Username"  value="<?php echo isset($_POST["Username"]) ? $_POST["Username"] : ''; ?>" </td>
                          </tr>

                          <tr>
                             <td>Email:</td>
                             <td><input type = "email" name = "Email"  value="<?php echo isset($_POST["Email"]) ? $_POST["Email"] : ''; ?>" </td>
                          </tr>

                          <tr>
                             <td>Password:</td>
                             <td><input type="Password" name = "Password"    value="<?php echo isset($_POST["Password"]) ? $_POST["Password"] : ''; ?>" </td>
                          </tr>
                      </table>

                  </div>
                  <input type="submit" id="btn" name="create" value="SUBMIT">
          </form>
      </div>

    </body>
    </html>
