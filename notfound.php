<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Not Found | BetterRolePlay</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="../assets/jquery/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../assets/css/master.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/notfound.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a href="https://betterroleplay.net/" class="navbar-brand mb-0 h1">
        <img src="../assets/images/logo.png" alt="Better Role Play Icon" width="60" height="60">
        BetterRolePlay <br>
        <p>We are Roleplay</p>
      </a>
      <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" class="navbar-toggler" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav justify-content-center">
          <li class="navbar-item premium"><a href="premium.php" class="navbar-a"><i class="fas fa-gem"></i>⠀Premium</a></li>
          <li class="navbar-item developer"><a href="developers.php" class="navbar-a"><i class="fas fa-code"></i>⠀Developer</a></li>
          <li class="navbar-item about"><a href="about.php" class="navbar-a"><i class="fas fa-book-reader"></i>⠀About</a></li>
          <li class="navbar-item bot"><a href="bot.php" class="navbar-a"><i class="fas fa-robot"></i>⠀Bot</a></li>
          <li class="navbar-item discord"><a href="https://betterroleplay.net/discord" class="navbar-a"><i class="fab fa-discord"></i>⠀Discord</a></li>
          <?php
          if(isset($_SESSION['access_token'])) {
            $user = apiRequest($apiURLBase);
            ?>
              <li class="navbar-item profile">
                <div class="dropdown">
                  <button class="dropbtn"><?php echo $user->username; ?></button>
                    <div class="dropdown-content">
                        <a href="dashboard.php">Dashboard</a>
                        <a href="billing.php">Billing</a>
                        <a href="signout.php" id="signout">Sign Out</a>
                   </div>
                </div>
              </li>
            <?php
          }
           ?>
           <li class="navbar-item profile"><a href="?action=login"><button type="button" class="btn btn-outline-primary navbar-buttons"><i class="fab fa-discord"></i> Login Trough Discord </button></a></li>
        </ul>
      </div>
    </nav>
    <div class="container justify-content-center" style="text-align: center;">
      <h1 class="h1notfound">Couldnt find the Page you're looking for<span id="span">!</span></h1>
      <h3><span id="span">Error 404</span><br><br><a href="https://betterroleplay.net"><button type="button" name="button" class="btn btn-primary">Back to home</button></a></h3>
      <img src="https://media.discordapp.net/attachments/815346241310425129/879796849173725264/MOSHED-2021-8-24-20-38-27.gif" alt="404 not found lol">
    </div>
    <footer class="bg-dark text-center text-lg-start">
      <div class="text-center p-3 footer-div" style="background-color: rgba(0, 0, 0, 0.2);">
        <p style="color: white;">Copyright &copy 2021</p>
        <a class="text-white" style="text-decoration: none;" href="https://betterroleplay.net/copyright">BetterRolePlay</a>
      </div>
    </footer>
  </body>
</html>
