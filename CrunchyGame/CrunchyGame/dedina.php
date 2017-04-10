<?php
include('session.php');
include('data.php');
session_start();
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
                   <a class="navbar-brand" href="#">Crunchy Game</a>
               </div>
               <div id="navbar" class="collapse navbar-collapse">
                   <ul class="nav navbar-nav">
                       <li>
                           <a href="profile.php">Profil</a>
                       </li>
                       <li class="active">
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
               <h1>Vaša dedina</h1>
               <p class="lead">
                   <table style="width:100%">
                       <tr>
                           <th>Radnica</th>
                           <th>Veža</th>
                           <th>Hostinec</th>
                       </tr>
                       <tr>
                           <td><img src="assets/img/budovy/radnica<?php echo $radnica?>.png" alt="Radnica" style="width:220px;height:200px;"></td>
                           <td><img src="assets/img/budovy/veza<?php echo $radnica?>.png" alt="Veža" style="width:200px;height:150px;"></td>
                           <td><img src="assets/img/budovy/hostinec<?php echo $radnica?>.png" alt="Hostinec" style="width:254px;height:228px;"></td>
                       </tr>
                       <tr>
                           <th>Kostol</th>
                           <th>Kasáreň</th>
                           <th>Hrad</th>
                       </tr>
                       <tr>
                           <td><img src="assets/img/budovy/kostol<?php echo $kostol?>.png" alt="Kostol" style="width:254px;height:228px;"></td>
                           <td><img src="assets/img/budovy/kasarne<?php echo $kasaren?>.png" alt="Kasáreň" style="width:304px;height:228px;"></td>
                           <td><img src="assets/img/budovy/hrad<?php echo $hrad?>.png" alt="Hrad" style="width:254px;height:228px;"></td>
                       </tr>
                   </table>
               </p>
            </div>

       </div><!-- /.container -->


           <!-- Bootstrap core JavaScript
    ================================================== -->
           <!-- Placed at the end of the document so the pages load faster -->
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
           <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
           <script src="assets/js/bootstrap.min.js"></script>

</body>
   