<?php
include('session.php');
?>
<html>
   
   <head>
      <title>Administrácia</title>
   </head>
   
   <body>
      <h1>Vitajte <?php echo 'Ahoj '.$$ses_sql; ?></h1> 
      <h2><a href = "logout.php">Odhlásiť sa</a></h2>
   </body>
   
</html>