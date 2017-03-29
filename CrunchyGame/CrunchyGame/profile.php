<?php
include('session.php');
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
      <h1>Vitajte ID: <?php echo $_SESSION['ID'] ?></h1> 
      <h2><a href = "logout.php">Odhlásiť sa</a></h2>
       <nav class="navbar navbar-inverse navbar-fixed-top">
           <div class="container">
               <div class="navbar-header">
                   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                       <span class="sr-only">Toggle navigation</span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                   </button>
                   <a class="navbar-brand" href="#">Project name</a>
               </div>
               <div id="navbar" class="collapse navbar-collapse">
                   <ul class="nav navbar-nav">
                       <li class="active">
                           <a href="#">Home</a>
                       </li>
                       <li>
                           <a href="#about">About</a>
                       </li>
                       <li>
                           <a href="#contact">Contact</a>
                       </li>
                   </ul>
               </div><!--/.nav-collapse -->
           </div>
       </nav>

       <div class="container">

           <div class="starter-template">
               <h1>Bootstrap starter template</h1>
               <p class="lead">
                   Use this document as a way to quickly start any new project.
                   <br />All you get is this text and a mostly barebones HTML document.
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
   