<?php
session_start();
if(empty($_SESSION["username"])) {
  header("Location: login.php?action=login");
}
 ?>
<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profile | BetterRolePlay</title>
  </head>
  <body>

  </body>
</html>
