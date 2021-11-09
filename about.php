<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>About | BetterRolePlay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="assets/jquery/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/master.css">
    <link rel="stylesheet" href="assets/css/about.css">
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
          <li class="navbar-item premium"><a href="https://www.patreon.com/betterroleplaynet" class="navbar-a"><i class="fas fa-gem"></i>⠀Premium</a></li>
          <li class="navbar-item developer"><a href="developers.php" class="navbar-a"><i class="fas fa-code"></i>⠀Developer</a></li>
          <li class="navbar-item about"><a href="about.php" class="navbar-a"><i class="fas fa-book-reader"></i>⠀About</a></li>
          <li class="navbar-item bot"><a href="bot.php" class="navbar-a disabled"><i class="fas fa-robot"></i>⠀Bot</a></li>
          <li class="navbar-item discord"><a href="https://betterroleplay.net/discord" class="navbar-a"><i class="fab fa-discord"></i>⠀Discord</a></li>
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
    <br>
    <h1 class="h1headline">Our Team</h1>
    <br>
    <div class="container">
      <div class="row">
        <h3 id="role-headline">Founders</h3>
        <br>
        <br>
        <div class="col">
          <img id="profilepicture" src="https://cdn.discordapp.com/avatars/495992765117890633/4d72ba4ed66d65845486c935c377edd0.png?size=128" alt="ShayLugia Profil Picture">
          <br>
          <br>
          <h4>ShayLugia</h4>
          <p>Founder</p>
        </div>
        <div class="col">
          <img id="profilepicture" src="https://cdn.discordapp.com/avatars/632187564119293973/babc041ff5335bee0caa6f5a6a7527e5.png?size=128" alt="RoderikTheRed Profil Picture">
          <br>
          <br>
          <h4>RoderikTheRed</h4>
          <p>Co-Founder / Developer</p>
        </div>
      </div>
      <div class="row">
        <h3 id="role-headline">Management</h3>
        <br>
        <br>
        <div class="col">
          <img id="profilepicture" src="https://cdn.discordapp.com/avatars/745251220641284118/388dd72c97a0ce63ec0f3e7a313f7598.png?size=128" alt="LoveRipe Profil Picture">
          <br>
          <br>
          <h4>Bifdy</h4>
          <p>Management</p>
        </div>
            <p></p>
          </div>
        </div>
        <div class="row">
          <h3 id="role-headline">Guide's</h3>
          <br>
          <br>
          <div class="col">
            <img id="profilepicture" src="https://cdn.discordapp.com/avatars/532157110310535168/10e9e88892c01e74850856dbde57d1c2.png?size=128" alt="ShayWayko Profil Picture">
            <br>
            <br>
            <h4>BlackZockt</h4>
            <p>Guide</p>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
