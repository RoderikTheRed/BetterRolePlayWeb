<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('max_execution_time', 300);

error_reporting(E_ALL);

session_start();
if(!isset($_SESSION["username"])) {
  header("Location: login.php?action=login");
  exit;
}
 ?>

<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BetterRolePlay | Create Link</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="assets/jquery/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/master.css">
    <link rel="stylesheet" href="assets/css/createlink.css">
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
            <li style="float: right;" class="navbar-item profile"><a href="profile.php" class="profile-loggedin"><h5>Logged in as <br><span id="username"><?php echo $_SESSION["username"]; ?></span></h5></a><h6><a href="login.php?action=logout" class="profile-loggedin">Logout</a></h6></li>
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
    <?php
    function createNewLink($invite, $domain, $ending, $username) {
      require("mysql.php");
      $stmt1 = $mysql->prepare("SELECT * FROM click WHERE ENDING = :ending UNION SELECT * FROM army WHERE ENDING = :ending UNION SELECT * FROM net WHERE ENDING = :ending UNION SELECT * FROM rip WHERE ENDING = :ending UNION SELECT * FROM best WHERE ENDING = :ending;");
      $stmt1->bindParam(":ending", $ending);
      $stmt1->execute();
      $row = $stmt1->rowCount();
      if($row != 0) {
          ?>
          <div class="alert alert-danger" role="alert">
              This ending is already taken!
          </div>
          <?php
      } else {
        $checklink = $mysql->prepare("SELECT * FROM click WHERE USERNAME = :username UNION SELECT * FROM army WHERE USERNAME = :username UNION SELECT * FROM net WHERE USERNAME = :username UNION SELECT * FROM rip WHERE USERNAME = :username UNION SELECT * FROM best WHERE USERNAME = :username;");
        $checklink->bindParam(":username", $username);
        $checklink->execute();
        $rowcount = $checklink->rowCount();
        if($rowcount != 3) {
          $command = 'sudo -u root python3 python/createlink.py '.$ending.' '.$domain.' '.$invite.' '.$username;
          escapeshellcmd($command);
          $output = shell_exec($command);
          header("Location: settings.php?server=".$ending."&new=True");
        } else {
          ?>
          <div class="alert alert-danger" role="alert">
              You cant create more than 3 endings!
          </div>
          <?php
        }
      }
    }
    if(isset($_POST["submit"])) {
      createNewLink($_POST["invite"], $_POST["choosedomain"], $_POST["ending"], $_SESSION["username"]);
    }
     ?>
    <br>
    <?php
    function isMobile() {
      return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
    if(!isMobile()) {
      ?>
      <div class="d-flex" id="wrapper">
          <div class="bg-dark" id="sidebar-wrapper">
              <div class="sidebar-heading bg-dark">
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
    }
     ?>
    <div class="container">
      <div class="container">
        <h3 class="headline">Adding Server</h3>
        <h3 class="create">Create a new <br>Link</h3>
        <br>
        <br>
        <form class="domain justify-content-center" action="createlink.php" method="post">
          <label for="invite">Permanent Server Invite</label>
          <br>
          <input required id="invite" type="url" name="invite">
          <br>
          <br>
          <label for="choosedomain">Domain</label>
          <select required name="choosedomain" id="choosedomain">
            <option value="net">betterroleplay.net/</option>
            <option value="click">roleplay.click/</option>
            <option value="army">roleplay.army/</option>
            <option value="rip">roleplay.rip/</option>
            <option value="best">roleplay.best/</option>
          </select>
          <br>
          <br>
          <label for="ending">Ending</label>
          <?php
          if(isMobile()) {
            ?>
            <br>
            <?php
          }
          ?>
          <input required type="text" name="ending" id="ending">
          <br>
          <br>
          <button type="submit" name="submit">Create Link</button>
          <br>
          <br>
        </form>
      </div>
    </div>
  <footer class="bg-dark text-center text-lg-start">
    <div class="text-center p-3 footer-div">
      <p style="color: white;">Copyright &copy 2021</p>
      <a class="text-white" style="text-decoration: none;" href="https://betterroleplay.net/copyright">BetterRolePlay</a>
    </div>
  </footer>
  </body>
</html>
