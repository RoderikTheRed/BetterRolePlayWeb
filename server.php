<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="assets/jquery/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/master.css">
    <link rel="stylesheet" href="assets/css/server.css">
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
        session_start();
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
  <div class="container">
    <div class="center">
        <img id="serverlogo" src="assets/images/logo.png" alt="ServerLogo" width="200" height="200">
        <h1>BetterRolePlay</h1>
        <a href="https://youtube.com"><button type="button">Join Discord</button></a>
        <br>
        <br>
        <a href="https://brp.wtf/discord" style="margin-right: 1%;"><button id="brp" type="button">BRP Discord</button></a>
        <a href="https://brp.wtf/discord"><button id="brp" type="button">BRP Website</button></a>
    </div>
  </div>
</body>
</html>
