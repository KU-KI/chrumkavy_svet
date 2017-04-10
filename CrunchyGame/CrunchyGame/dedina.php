<?php
include('session.php');
include('data.php');
include('config.php');
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
                           <td><img src="assets/img/budovy/veza<?php echo $veza?>.png" alt="Veža" style="width:200px;height:150px;"></td>
                           <td><img src="assets/img/budovy/hostinec<?php echo $hostinec?>.png" alt="Hostinec" style="width:254px;height:228px;"></td>
                       </tr>
                       <tr>
                           <th>Kostol</th>
                           <th>Kasáreň</th>
                           <th>Hrad</th>
                       </tr>
                       <tr>
                           <td><img src="assets/img/budovy/kostol<?php echo $kostol?>.png" alt="Kostol" style="width:254px;height:228px;"></td>
                           <td><img src="assets/img/budovy/kasarne<?php echo $kasaren?>.png" alt="Kasáreň" style="width:304px;height:228px;"></td>
                           <td><img src="assets/img/budovy/hrad<?php echo $hrad?>.png" alt="Hrad" style="width:204px;height:228px;"></td>
                       </tr>
                   </table>
                   <center>
                       <table>
                           <tr>
                               <th>Hráč</th>
                               <th>Skóre</th>
                           </tr>
                           <tr>
                               <td>test</td>
                           </tr>
                           <?php
                               $sql = "SELECT id, username, level FROM account WHERE id>0";
                               $result = $db->query($sql);
                               if ($result->num_rows > 0) {
                                   while($row = $result->fetch_assoc()) {
                                       //$curentlevel=$row["level"];
                                       /*$sql1 = "SELECT level,xpreq,radnica,veza,hostinec,kostol,kasaren,hrad FROM levelstruct WHERE level='$curentlevel'";
                                       $result1 = $db->query($sql1);
                                       if ($result1->num_rows > 0) {
                                           while($row1 = $result1->fetch_assoc()) {
                                               $xpreq1=$row1["xpreq"]; $radnica1=$row1["radnica"]; $veza1=$row1["veza"]; $hostinec1=$row1["hostinec"]; $kostol1=$row1["kostol"]; $kasaren1=$row1["kasaren"]; $hrad1=$row1["hrad"];
                                           }
                                       }*/
                                       //$AlgoMX = (70*$radnica1 + 90*$veza1 + 120*$hostinec1 + 150*$kostol1 + 200*$kasaren1 + 500*$hrad1)/1.25;
                                       echo '<tr><td>'.$row["username"].'</td>';
                                       echo '<td>'.'11'.'</td></tr>';
                                   }
                               }
                               $db->close();
                           ?>
                       </table>
                   </center>
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
   