<?php
include('session.php');
session_start();
?>
<html>
   
   <head>
      <title>Administrácia</title>
   </head>
   
   <body>
      <h1>Vitajte <?php echo $_SESSION['login_user'] ?></h1> 
      <h2><a href = "logout.php">Odhlásiť sa</a></h2>
   </body>
   
</html>