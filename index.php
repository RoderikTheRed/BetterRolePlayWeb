<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('max_execution_time', 300);

error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BetterRolePlay | Home</title>
    <meta property="og:site_name" content="Join the RolePlay Army today!">
    <meta property="og:title" content="BetterRolePlay">
    <meta property="og:image" content="https://cdn.discordapp.com/attachments/815346241310425129/900091067699974204/BetterRolePlayICONWASSERZEICHEN.png?size=128">
    <meta property="og:description" content="BetterRolePlay, the place for every RolePlay player, big RolePlay Community.">
    <meta property="twitter:card" content="summary">
    <meta property="twitter:title" content="BetterRolePlay">
    <meta property="twitter:image" content="https://cdn.discordapp.com/attachments/815346241310425129/900091067699974204/BetterRolePlayICONWASSERZEICHEN.png?size=128">
    <meta property="twitter:description" content="BetterRolePlay, the place for every RolePlay player, big RolePlay Community.">
    <meta name="theme-color" content="#e5bfff">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="assets/jquery/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/master.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png" />
  </head>
  <body>
    <style>
      body {
        background: #1F222C;
      }
    </style>
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
    <?php
    if(isset($_GET["logout"])) {
      if($_GET["logout"] == "manual") {
        ?>
        <div class="alert alert-success" role="alert">
          Successfully logged out
          <a href="index.php"><i style="float: right; color: black;" class="fas fa-times-circle"></i></a>
        </div>
        <?php
      }
    }
     ?>
    <br>
    <div class="headline">
      <h1><span>Find</span> a <span>suitable server</span> for you</h1>
      <h3>Find your server using BetterRolePlay</h3>
    </div>
    <br>
    <form class="justify-content-center searchbar" action="index.php" method="post">
      <a href="createlink.php"><button type="button" class="btn btn-outline-primary">Create Link</button></a>
      <input required type="search" name="search" placeholder="Search for Server" aria-label="Search for Server" aria-describedby="search-addon" />
      <a href="discord/notfound.php"><button class="btn btn-outline-primary" id="search-addon" type="submit" name="submit-searchbar"><i class="fas fa-search"></i></button></a>
    </form>
    <br>
    <h3 style="color: white; text-align: center;">Partnered Server</h3>
    <br>
    <?php
    function isMobile() {
      return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
    ?>
    <div class="container">
      <?php
      if(isMobile()) {
        ?>
        <div class="row">
          <div class="col">
          <a href="https://discord.gg/6gwVNwKaFM"><div class="container-normal">
            <img src="https://cdn.discordapp.com/icons/631225082903265320/a_3a2221324eb9ee9033d8eda13e10bd04.gif?size=128" alt="Server Logo" width="128" height="128">
            <div class="container-normal-1">
              <div class="container-normal-2">
                <input id="clicks" value="RolePlay" readonly>
                <h5>United Roleplay</h5>
                <p id="main-text">Language: English<br>Devices: FiveM, PS4, PS5, XBox <br>Member: 115.000+</p>
              </div>
            </div>
          </div>
          </a>
          </div>
    </div>
    <div class="row">
    <div class="col">
          <a href="https://discord.gg/kXBjbjvBK6"><div class="container-normal">
            <img src="https://media.discordapp.net/attachments/884833077048787015/900793295620411402/FG_New_Discord_Animiert.gif" alt="Server Logo" width="128" height="128">
            <div class="container-normal-1">
              <div class="container-normal-2">
                <input id="clicks" value="Community" readonly>
                <h5>FiveM Germany</h5>
                <p id="main-text">Language: Deutsch<br>Member: 2000+</p>
              </div>
            </div>
          </div>
          </a>
        </div>
    </div>
        <div class="row">
    <div class="col">
          <a href="https://discord.gg/pQETrCbXfm"><div class="container-normal">
            <img src="https://cdn.discordapp.com/icons/882982151371493386/26f70f335148606c0c40d05044b332f3.webp?size=128" alt="Server Logo" width="128" height="128">
            <div class="container-normal-1">
              <div class="container-normal-2">
                <input id="clicks" value="RolePlay" readonly>
                <h5>KyroLife Roleplay</h5>
                <p id="main-text">Language: Deutsch<br>Devices: PS4, PS5<br>Member: 50+</p>
              </div>
            </div>
          </div>
          </a>
        </div>
    </div>
    <div class="row">
      <div class="col">
            <a href="https://discord.gg/PW3mTTcKVp"><div class="container-normal">
              <img src="https://cdn.discordapp.com/icons/758409559555047426/932c8a3f388b05eddde09fcca4ac16e4.png?size=128" alt="Server Logo" width="128" height="128">
              <div class="container-normal-1">
                <div class="container-normal-2">
                  <input id="clicks" value="RolePlay" readonly>
                  <h5>Washington D.C. RP</h5>
                  <p id="main-text">Language: Deutsch<br>Devices: PS4, PS5<br>Member: 550+</p>
                </div>
              </div>
            </div>
            </a>
          </div>
    </div>
    <div class="row">
    <div class="col">
          <a href="https://discord.gg/MaUqbrD3Pb"><div class="container-normal">
            <img src="https://cdn.discordapp.com/attachments/815346241310425129/901834856953180200/a_fcde47c472b871a623d4198f8b023663.png?size=128" alt="Server Logo" width="128" height="128">
            <div class="container-normal-1">
              <div class="container-normal-2">
                <input id="clicks" value="RolePlay" readonly>
                <h5>Altaria-V</h5>
                <p id="main-text">Language: Deutsch<br>Devices: FiveM<br>Member: 220+</p>
              </div>
            </div>
          </div>
          </a>
        </div>
       </div>
       <div class="row">
       <div class="col">
             <a href="https://discord.gg/pVe2wnJHf9"><div class="container-normal">
               <img src="https://cdn.discordapp.com/icons/686234706458705930/a_86475f557a5da2d4b1fa3ceb5922974b.webp?size=128" alt="Server Logo" width="128" height="128">
               <div class="container-normal-1">
                 <div class="container-normal-2">
                   <input id="clicks" value="RolePlay" readonly>
                   <h5>NightLife</h5>
                   <p id="main-text">Language: Deutsch<br>Devices: PS4, PS5<br>Member: 170+</p>
                 </div>
               </div>
             </div>
             </a>
           </div>
          </div>
      <div class="row">
      <div class="col">
                <a href="https://discord.gg/7GMScvjQCQ"><div class="container-normal">
                  <img src="https://cdn.discordapp.com/icons/723896804868882464/a_e252e379a211b478b420b325329242de.webp?size=128" alt="Server Logo" width="128" height="128">
                  <div class="container-normal-1">
                    <div class="container-normal-2">
                      <input id="clicks" value="RolePlay" readonly>
                      <h5>GLA RolePlay</h5>
                      <p id="main-text">Language: Deutsch<br>Devices: PS4, PS5<br>Member: 3800+</p>
                    </div>
                  </div>
                </div>
                </a>
              </div>
             </div>
             <div class="row">
             <div class="col">
                       <a href="https://discord.gg/bwYa9SUbEy"><div class="container-normal">
                         <img src="https://media.discordapp.net/attachments/902152689109045288/902162319969239080/ezgif.com-gif-maker_19.gif" alt="Server Logo" width="128" height="128">
                         <div class="container-normal-1">
                           <div class="container-normal-2">
                             <input id="clicks" value="RolePlay" readonly>
                             <h5>NeonLife</h5>
                             <p id="main-text">Language: Deutsch<br>Devices: PS4, PS5<br>Member: 400+</p>
                           </div>
                         </div>
                       </div>
                       </a>
                     </div>
                    </div>
                    <div class="row">
                    <div class="col">
                              <a href="https://discord.gg/kEdMckxSRE"><div class="container-normal">
                                <img src="https://cdn.discordapp.com/icons/893804524588920862/85cd694a1c885bb9a627775cf224ba0f.webp?size=128" alt="Server Logo" width="128" height="128">
                                <div class="container-normal-1">
                                  <div class="container-normal-2">
                                    <input id="clicks" value="RolePlay" readonly>
                                    <h5>CreedLife</h5>
                                    <p id="main-text">Language: Deutsch<br>Devices: PS4, PS5<br>Member: 170+</p>
                                  </div>
                                </div>
                              </div>
                              </a>
                            </div>
                           </div>
                           <div class="row">
                           <div class="col">
                                     <a href="https://discord.gg/aBcJ9zMg5J"><div class="container-normal">
                                       <img src="https://cdn.discordapp.com/icons/891747095348912178/c5fa18f82cd8b4820f2543c832ed98b8.webp?size=128" alt="Server Logo" width="128" height="128">
                                       <div class="container-normal-1">
                                         <div class="container-normal-2">
                                           <input id="clicks" value="Community" readonly>
                                           <h5>Space Hotel</h5>
                                           <p id="main-text">Language: Deutsch<br>Member: 50+</p>
                                         </div>
                                       </div>
                                     </div>
                                     </a>
                                   </div>
                                 </div>
                                 <div class="row">
                                 <div class="col">
                                           <a href="https://discord.gg/J9hGaCRPyY"><div class="container-normal">
                                             <img src="https://cdn.discordapp.com/icons/701541086077649008/a_c21b6e51fe7a66d69143b5493b415966.webp?size=128" alt="Server Logo" width="128" height="128">
                                             <div class="container-normal-1">
                                               <div class="container-normal-2">
                                                 <input id="clicks" value="RolePlay" readonly>
                                                 <h5>City of Law & Order</h5>
                                                 <p id="main-text">Language: English<br>Devices: PS4, PS5<br>Member: 1400+</p>
                                               </div>
                                             </div>
                                           </div>
                                           </a>
                                         </div>
                                        </div>
    <div class="row">
    <div class="col">
          <a href="https://betterroleplay.net/discord"><div class="container-normal">
            <img src="assets/images/logo.png" alt="Server Logo" width="128" height="128">
            <div class="container-normal-1">
              <div class="container-normal-2">
                <input id="clicks" value="Promoted" readonly>
                <h5>A Place for your Server</h5>
                <p id="main-text">Join our Discord, and send us a Partner Request!</p>
              </div>
            </div>
          </div>
          </a>
        </div>
    </div>
        <?php
      } else {
        ?>
        <div class="row">
        <div class="col">
          <a href="https://discord.gg/6gwVNwKaFM"><div class="container-normal">
            <img src="https://cdn.discordapp.com/icons/631225082903265320/a_3a2221324eb9ee9033d8eda13e10bd04.gif?size=128" alt="Server Logo" width="128" height="128">
            <div class="container-normal-1">
              <div class="container-normal-2">
                <input id="clicks" value="RolePlay" readonly>
                <h5>United Roleplay</h5>
                <p id="main-text">Language: English<br>Devices: FiveM, PS4, PS5 XBox<br>Member: 115.000+</p>
              </div>
            </div>
          </div>
          </a>
        </div>
        <div class="col">
              <a href="https://discord.gg/kXBjbjvBK6"><div class="container-normal">
                <img src="https://media.discordapp.net/attachments/884833077048787015/900793295620411402/FG_New_Discord_Animiert.gif" alt="Server Logo" width="128" height="128">
                <div class="container-normal-1">
                  <div class="container-normal-2">
                    <input id="clicks" value="Community" readonly>
                    <h5>FiveM Germany</h5>
                    <p id="main-text">Language: Deutsch<br>Member: 2000+</p>
                  </div>
                </div>
              </div>
              </a>
            </div>
        <div class="col">
          <a href="https://discord.gg/pQETrCbXfm"><div class="container-normal">
            <img src="https://cdn.discordapp.com/icons/882982151371493386/26f70f335148606c0c40d05044b332f3.webp?size=128" alt="Server Logo" width="128" height="128">
            <div class="container-normal-1">
              <div class="container-normal-2">
                <input id="clicks" value="RolePlay" readonly>
                <h5>KyroLife Roleplay</h5>
                <p id="main-text">Language: Deutsch<br>Devices: PS4, PS5<br>Member: 50+</p>
              </div>
            </div>
          </div>
          </a>
        </div>
        <div class="col">
          <a href="https://discord.gg/PW3mTTcKVp"><div class="container-normal">
            <img src="https://cdn.discordapp.com/icons/758409559555047426/932c8a3f388b05eddde09fcca4ac16e4.png?size=128" alt="Server Logo" width="128" height="128">
            <div class="container-normal-1">
              <div class="container-normal-2">
                <input id="clicks" value="RolePlay" readonly>
                <h5>Washington D.C. RP</h5>
                <p id="main-text">Language: Deutsch<br>Devices: PS4, PS5<br>Member: 550+</p>
              </div>
            </div>
          </div>
          </a>
        </div>
      </div>
      <br>
      <br>
      <div class="row">
      <div class="col">
          <a href="https://discord.gg/MaUqbrD3Pb"><div class="container-normal">
            <img src="https://cdn.discordapp.com/attachments/815346241310425129/901834856953180200/a_fcde47c472b871a623d4198f8b023663.png?size=128" alt="Server Logo" width="128" height="128">
            <div class="container-normal-1">
              <div class="container-normal-2">
                <input id="clicks" value="RolePlay" readonly>
                <h5>Altaria-V</h5>
                <p id="main-text">Language: Deutsch<br>Devices: FiveM<br>Member: 220+</p>
              </div>
            </div>
          </div>
          </a>
        </div>
        <div class="col">
              <a href="https://discord.gg/pVe2wnJHf9"><div class="container-normal">
                <img src="https://cdn.discordapp.com/icons/686234706458705930/a_86475f557a5da2d4b1fa3ceb5922974b.webp?size=128" alt="Server Logo" width="128" height="128">
                <div class="container-normal-1">
                  <div class="container-normal-2">
                    <input id="clicks" value="RolePlay" readonly>
                    <h5>NightLife</h5>
                    <p id="main-text">Language: Deutsch<br>Devices: PS4, PS5<br>Member: 170+</p>
                  </div>
                </div>
              </div>
              </a>
            </div>
            <div class="col">
                      <a href="https://discord.gg/7GMScvjQCQ"><div class="container-normal">
                        <img src="https://cdn.discordapp.com/icons/723896804868882464/a_e252e379a211b478b420b325329242de.webp?size=128" alt="Server Logo" width="128" height="128">
                        <div class="container-normal-1">
                          <div class="container-normal-2">
                            <input id="clicks" value="RolePlay" readonly>
                            <h5>GLA RolePlay</h5>
                            <p id="main-text">Language: Deutsch<br>Devices: PS4, PS5<br>Member: 3800+</p>
                          </div>
                        </div>
                      </div>
                      </a>
                    </div>
                    <div class="col">
                              <a href="https://discord.gg/bwYa9SUbEy"><div class="container-normal">
                                <img src="https://media.discordapp.net/attachments/902152689109045288/902162319969239080/ezgif.com-gif-maker_19.gif" alt="Server Logo" width="128" height="128">
                                <div class="container-normal-1">
                                  <div class="container-normal-2">
                                    <input id="clicks" value="RolePlay" readonly>
                                    <h5>NeonLife</h5>
                                    <p id="main-text">Language: Deutsch<br>Devices: PS4, PS5<br>Member: 400+</p>
                                  </div>
                                </div>
                              </div>
                              </a>
                            </div>
                          </div>
                          <br>
                          <br>
        <div class="row">
          <div class="col">
                    <a href="https://discord.gg/kEdMckxSRE"><div class="container-normal">
                      <img src="https://cdn.discordapp.com/icons/893804524588920862/85cd694a1c885bb9a627775cf224ba0f.webp?size=128" alt="Server Logo" width="128" height="128">
                      <div class="container-normal-1">
                        <div class="container-normal-2">
                          <input id="clicks" value="RolePlay" readonly>
                          <h5>CreedLife</h5>
                          <p id="main-text">Language: Deutsch<br>Devices: PS4, PS5<br>Member: 170+</p>
                        </div>
                      </div>
                    </div>
                    </a>
                  </div>
                  <div class="col">
                            <a href="https://discord.gg/aBcJ9zMg5J"><div class="container-normal">
                              <img src="https://cdn.discordapp.com/icons/891747095348912178/c5fa18f82cd8b4820f2543c832ed98b8.webp?size=128" alt="Server Logo" width="128" height="128">
                              <div class="container-normal-1">
                                <div class="container-normal-2">
                                  <input id="clicks" value="Community" readonly>
                                  <h5>Space Hotel</h5>
                                  <p id="main-text">Language: Deutsch<br>Member: 50+</p>
                                </div>
                              </div>
                            </div>
                            </a>
                          </div>
                          <div class="col">
                                    <a href="https://discord.gg/J9hGaCRPyY"><div class="container-normal">
                                      <img src="https://cdn.discordapp.com/icons/701541086077649008/a_c21b6e51fe7a66d69143b5493b415966.webp?size=128" alt="Server Logo" width="128" height="128">
                                      <div class="container-normal-1">
                                        <div class="container-normal-2">
                                          <input id="clicks" value="RolePlay" readonly>
                                          <h5>City of Law & Order</h5>
                                          <p id="main-text">Language: English<br>Devices: PS4, PS5<br>Member: 1400+</p>
                                        </div>
                                      </div>
                                    </div>
                                    </a>
                                  </div>
        <div class="col">
          <a href="https://betterroleplay.net/discord"><div class="container-normal">
            <img src="assets/images/logo.png" alt="Server Logo" width="128" height="128">
            <div class="container-normal-1">
              <div class="container-normal-2">
                <input id="clicks" value="Promoted" readonly>
                <h5>A Place for your Server</h5>
                <p id="main-text">Join our Discord, and send us a Partner Request!</p>
              </div>
            </div>
          </div>
          </a>
        </div>
      </div>
    </div>
        <?php
      }
      ?>
    <br>
    <br>
    <footer class="bg-dark text-center text-lg-start">
      <div class="text-center p-3 footer-div" style="background-color: rgba(0, 0, 0, 0.2);">
        <p style="color: white;">Copyright &copy 2021</p>
        <a class="text-white" style="text-decoration: none;" href="https://betterroleplay.net/copyright/">BetterRolePlay</a>
      </div>
    </footer>
  </body>
</html>
