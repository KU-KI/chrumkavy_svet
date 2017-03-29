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
   </head>
   
   <body>
      <h1>Vitajte ID: <?php echo $_SESSION['ID'] ?></h1> 
      <h2><a href = "logout.php">Odhlásiť sa</a></h2>

       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
       <!-- Include all compiled plugins (below), or include individual files as needed -->
       <script src="js/bootstrap.min.js"></script>

   </body>
   