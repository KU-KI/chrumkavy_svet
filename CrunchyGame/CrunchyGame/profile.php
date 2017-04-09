<?php
include('session.php');
include('data.php');
session_start();
//% do progress baru

?>
<!DOCTYPE html>
   
   <head>
      <title>Administrácia</title>
       <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link href="assets/css/bootstrap.min.css" rel="stylesheet">
       <link href="assets/css/administracia.css" rel="stylesheet" />
   </head>
   
   <body>
       <nav class="navbar navbar-inverse navbar-fixed-top">
           <div class="container">
               <div class="navbar-header">
                   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                       <span class="sr-only">Toggle navigation</span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                   </button>
                   <a class="navbar-brand" href="profile.php">Crunchy Game</a>
               </div>
               <div id="navbar" class="collapse navbar-collapse">
                   <ul class="nav navbar-nav">
                       <li class="active">
                           <a href="profile.php">Profil</a>
                       </li>
                       <li>
                           <a href="dedina.php">Dedina</a>
                       </li>
                       <li>
                           <a href="battlevalley.php">Bojová Sieň</a>
                       </li>
                       <li align="right">
                           <a href="logout.php">Odhlásiť</a>
                       </li>
                       <li>
                          <p><span style="color:lightgray">ID: <?php echo $_SESSION['ID'];?> Používateľ: <?php echo $_SESSION['username'];?></span></p>
                       </li>
                   </ul>
               </div><!--/.nav-collapse -->
           </div>
       </nav>

       <div class="container">
           <div class="starter-template">
               <h1>Váš profil</h1>
               <p class="lead">
                   <p>
                       <center>
                           <img src="assets/img/avatar/<?php echo $avatar; ?>.png" style="width:120px;height:120px;" />
                       </center>
                   </p>
                   Váš Nickname: <?php echo $nickname; ?>
                   <br /><h4>Level: <?php echo $level.'/30'; ?></h4>
                    XP: <?php 
                        if($level<30) echo $xp.'/'.$xpreq; 
                        else echo 'MAX';?>
                   <div class="progress">
                       <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $xp;?>"
                           aria-valuemin="0" aria-valuemax="100" style="width:<?php echo 100*($xp/$xpreq);?>%"><?php echo 100*($xp/$xpreq);?>%
                       </div>
                   </div>
                   <br /><br />
                   <a href="settings.php" class="btn btn-primary" role="button">Nastavenia</a>
               </p>
           </div>
       </div>


       <!-- Bootstrap core JavaScript
    ================================================== -->
       <!-- Placed at the end of the document so the pages load faster -->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
       <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
       <script src="assets/js/bootstrap.min.js"></script>

   </body>
   