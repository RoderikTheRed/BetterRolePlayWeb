<?php
session_start();
if(!isset($_SESSION["username"])) {
  header("Location: login.php?action=login");
  exit;
}
if(!isset($_GET["server"])) {
  header("Location: index.php");
} else {
  if(empty($_GET["server"])) {
    header("Location: index.php");
  } else {
    require("mysql.php");
    $checkinvite = $mysql->prepare("SELECT * FROM click WHERE USERNAME = :username AND ENDING = :ending UNION SELECT * FROM army WHERE USERNAME = :username AND ENDING = :ending UNION SELECT * FROM net WHERE USERNAME = :username AND ENDING = :ending UNION SELECT * FROM rip WHERE USERNAME = :username  AND ENDING = :ending UNION SELECT * FROM best WHERE USERNAME = :username AND ENDING = :ending;");
    $checkinvite->bindParam(":username", $_SESSION["username"]);
    $checkinvite->bindParam(":ending", $_GET["server"]);
    $checkinvite->execute();
    $checkinviterowcount = $checkinvite->rowCount();
    if($checkinviterowcount == 0) {
      header("Location: discord/notfound.php");
    } else {
      if (isset($_GET["new"])) {
        if(!empty($_GET["new"])) {
          ?>
          <div class="alert alert-success" role="alert">
            Success! Your Link has been created!
          </div>
          <?php
        }
      }
    }
  }
}
 ?>
<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Link Settings | BetterRolePlay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="assets/jquery/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/master.css">
    <link rel="stylesheet" href="assets/css/settings.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a href="https://betterroleplay.net/" class="navbar-brand mb-0 h1">
        <img src="assets/images/logo.png" alt="Better Role Play Icon" width="60" height="60">
        BetterRolePlay <br>
        <p>We are Roleplay</p>
      </a>
      <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" class="navbar-toggler" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav justify-content-center">
          <li id="down" class="navbar-item premium"><a href="https://www.patreon.com/betterroleplaynet" class="navbar-a"><i class="fas fa-gem"></i>⠀Premium</a></li>
          <li id="down" class="navbar-item developer"><a href="developers.php" class="navbar-a"><i class="fas fa-code"></i>⠀Developer</a></li>
          <li id="down" class="navbar-item about"><a href="about.php" class="navbar-a"><i class="fas fa-book-reader"></i>⠀About</a></li>
          <li id="down" class="navbar-item bot"><a class="navbar-a disabled"><i class="fas fa-robot"></i>⠀Bot</a></li>
          <li id="down" class="navbar-item discord"><a href="https://betterroleplay.net/discord" class="navbar-a"><i class="fab fa-discord"></i>⠀Discord</a></li>
          <?php
          if(!empty($_SESSION["username"])) {
            ?>
            <li class="navbar-item profile"><a href="profile.php" class="profile-loggedin"><h5>Logged in as <br><span id="username"><?php echo $_SESSION["username"]; ?></span></h5></a><h6><a href="login.php?action=logout" class="profile-loggedin">Logout</a></h6></li>
            <?php
          } else {
            ?>
            <li class="navbar-item profile"><a href="login.php?action=login"><button type="button" class="btn btn-outline-primary navbar-buttons"><i class="fab fa-discord"></i> Login Trough Discord </button></a></li>
            <?php
          }
           ?>
        </ul>
      </div>
    </nav>
    <br>
    <div class="d-flex" id="wrapper">
        <div class="bg-dark" id="sidebar-wrapper">
            <div class="sidebar-heading bg-dark"></div>
            <div class="list-group list-group-flush bg-dark">
                <?php
                require("mysql.php");
                $stmt = $mysql->prepare("SELECT * FROM click WHERE USERNAME = :username UNION SELECT * FROM army WHERE USERNAME = :username UNION SELECT * FROM net WHERE USERNAME = :username UNION SELECT * FROM rip WHERE USERNAME = :username UNION SELECT * FROM best WHERE USERNAME = :username;");
                $stmt->bindParam(":username", $_SESSION["username"]);
                $stmt->execute();
                while ($row = $stmt->fetch()) {
                  ?>
                  <a class="list-group-item bg-dark list-group-item-action list-group-item-light p-3" style="color: white;" href="settings.php?server=<?php echo $row["ENDING"]; ?>"><?php echo $row["ENDING"]; ?></a>
                  <?php
                }
                 ?>
                <a class="list-group-item bg-dark list-group-item-action list-group-item-light p-3" style="color: white; text-align: center;" href="createlink.php"><i class="fas fa-plus"></i></a>
        </div>
    </div>
    <?php
    require("mysql.php");
    $stmt1 = $mysql->prepare("SELECT * FROM click WHERE USERNAME = :username AND ENDING = :ending UNION SELECT * FROM army WHERE USERNAME = :username AND ENDING = :ending UNION SELECT * FROM net WHERE USERNAME = :username AND ENDING = :ending UNION SELECT * FROM rip WHERE USERNAME = :username  AND ENDING = :ending UNION SELECT * FROM best WHERE USERNAME = :username AND ENDING = :ending;");
    $stmt1->bindParam(":username", $_SESSION["username"]);
    $stmt1->bindParam(":ending", $_GET["server"]);
    $stmt1->execute();
    $row1 = $stmt1->fetch();
     ?>
    <div class="container">
      <div class="container">
        <h3 class="headline">Link Settings</h3>
        <?php
        if(isset($_POST["save-embed"])) {
          $command = 'sudo -u root python3 python/changelink.py '.$_POST["ending-embed"].' '.$_POST["redirect-embed"].' '.$row1["ENDING"].' '.$row1["INVITE"];
          escapeshellcmd($command);
          $output = shell_exec($command);
        }
         ?>
        <form class="form-1" action="settings.php?server=<?php echo $_GET["server"]; ?>" method="post">
          <label for="redirect">Link Redirect <span>Where we will redirect visitors</span></label>
          <br>
          <input required id="redirect" type="url" name="redirect-embed" value="<?php echo $row1["INVITE"]; ?>">
          <br>
          <br>
          <label for="ending">Link Ending <span>Choose your vanity link</span></label>
          <br>
          <input required id="ending" type="text" name="ending-embed" value="<?php echo $row1["ENDING"]; ?>">
          <br>
          <br>
          <button type="submit" name="save-embed">Save</button>
        </form>
      </div>
    </div>
  </body>
</html>
