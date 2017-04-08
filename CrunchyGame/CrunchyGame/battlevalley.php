<?php
include('session.php');
session_start();
$nahoda=rand(1, 31);
$sql = "SELECT otazka, prva, druha, tretia, spravna FROM otazky WHERE id='$nahoda'";
$result = $db->query($sql);
//premenné
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $otazka=$row["otazka"]; $prva=$row["prva"]; $druha=$row["druha"]; $tretia=$row["tretia"]; $spravna=$row["spravna"];
    }
}
if(isset($_POST['odoslat']))
{
    echo $_POST["otazka"].$_POST["spravnaODP"];
    if($_POST["otazka"]===$_POST["spravnaODP"])
    {
        echo '<br><center>Správne!</center>';
    }
    else
    {
        echo '<center>nesprávne</center>';
    }
}
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
                       <li>
                           <a href="dedina.php">Dedina</a>
                       </li>
                       <li class="active">
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
       <span id="timer"></span>
       <div class="container">
           <div class="starter-template">
               <h1>Bojová Sieň</h1>
               <form method="post" action="">
                   <p class="lead">
                       <h2>
                           <?php echo $otazka; ?>
                       </h2>
                       <h4>
                           <input type='hidden' name="spravnaODP" value=" <?php echo $spravna; ?> " />
                           <input type="radio" name="otazka" value="<?php echo $prva; ?>" /><?php echo $prva; ?>
                           <br />
                           <br />
                           <input type="radio" name="otazka" value="<?php echo $druha; ?>" /><?php echo $druha; ?>
                           <br />
                           <br />
                           <input type="radio" name="otazka" value="<?php echo $tretia; ?>" /><?php echo $tretia; ?>
                           <br />
                           <br />
                           <input type="radio" name="otazka" value="<?php echo $spravna; ?>" /><?php echo $spravna; ?>
                       </h4>
                       <br />
                       <br />
                       <button type="submit" class="btn btn-danger" button name="odoslat">Odoslať odpoveď</button>
                   </p>
               </form>
            </div>
           </div><!-- /.container -->


           <!-- Bootstrap core JavaScript
    ================================================== -->
           <!-- Placed at the end of the document so the pages load faster -->
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
           <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
           <script src="assets/js/bootstrap.min.js"></script>
           <script src="assets/js/funkcie.js"></script>
            

</body>
   