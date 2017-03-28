<?php
include('session.php');
session_start();
?>
<html>
   
   <head>
      <title>Administrácia</title>
   </head>
   
   <body>
      <h1>Vitajte ID: <?php echo $_SESSION['ID'] ?></h1> 
      <h2><a href = "logout.php">Odhlásiť sa</a></h2>
   </body>
   
</html>