<?php
include('session.php');
include('data.php');
include('config.php');
session_start();
if (isset($_POST['zmenheslo']))
{
    $dedinahladaj = mysqli_real_escape_string($db,$_POST['dedina']);
    echo $dedinahladaj;
    if($dedinahladaj != '')
    {
        echo $dedinahladaj;
        $sql = "SELECT level FROM account WHERE username='$dedinahladaj'";
        $result = $db->query($sql);
        //premenné pre profil a pracu s profilom
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $level=$row["level"];
            }
        }
        $sql = "SELECT radnica,veza,hostinec,kostol,kasaren,hrad FROM levelstruct WHERE level='$level'";
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $radnica=$row["radnica"]; $veza=$row["veza"]; $hostinec=$row["hostinec"]; $kostol=$row["kostol"]; $kasaren=$row["kasaren"]; $hrad=$row["hrad"];
            }
        }
    }
    $db->close();
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
                           <th>Radnica [<?php echo $radnica; ?>]</th>
                           <th>Veža [<?php echo $veza; ?>]</th>
                           <th>Hostinec [<?php echo $hostinec; ?>]</th>
                       </tr>
                       <tr>
                           <td><img src="assets/img/budovy/radnica<?php echo $radnica?>.png" alt="Radnica" style="width:220px;height:200px;"></td>
                           <td><img src="assets/img/budovy/veza<?php echo $veza?>.png" alt="Veža" style="width:220px;height:150px;"></td>
                           <td><img src="assets/img/budovy/hostinec<?php echo $hostinec?>.png" alt="Hostinec" style="width:234px;height:228px;"></td>
                       </tr>
                       <tr>
                           <th>Kostol [<?php echo $kostol; ?>]</th>
                           <th>Kasáreň [<?php echo $kasaren; ?>]</th>
                           <th>Hrad [<?php echo $hrad; ?>]</th>
                       </tr>
                       <tr>
                           <td><img src="assets/img/budovy/kostol<?php echo $kostol?>.png" alt="Kostol" style="width:224px;height:228px;"></td>
                           <td><img src="assets/img/budovy/kasarne<?php echo $kasaren?>.png" alt="Kasáreň" style="width:304px;height:228px;"></td>
                           <td><img src="assets/img/budovy/hrad<?php echo $hrad?>.png" alt="Hrad" style="width:224px;height:228px;"></td>
                       </tr>
                   </table>
                   <center>
                       <h1>Skóre hráčov</h1>
                       <div class="table-responsive">
                           <table class="table">
                               <tr>
                                   <th>Hráč</th>
                                   <th>Skóre</th>
                               </tr><?php
                                $najlepsihracscore = 0; $najlepsihracmeno = '';
                               $sql = "SELECT id, username, level, xp FROM account WHERE id>0";
                               $result = $db->query($sql);
                               if ($result->num_rows > 0) {
                                   while($row = $result->fetch_assoc()) {
                                       $curentlevel=$row["level"];
                                       $sql1 = "SELECT level,xpreq,radnica,veza,hostinec,kostol,kasaren,hrad FROM levelstruct WHERE level='$curentlevel'";
                                       $result1 = $db->query($sql1);
                                       if ($result1->num_rows > 0) {
                                           while($row1 = $result1->fetch_assoc()) {
                                               $xpreq1=$row1["xpreq"]; $radnica1=$row1["radnica"]; $veza1=$row1["veza"]; $hostinec1=$row1["hostinec"]; $kostol1=$row1["kostol"]; $kasaren1=$row1["kasaren"]; $hrad1=$row1["hrad"];
                                           }
                                       }
                                       $AlgoMX = ((70*$radnica1 + 90*$veza1 + 120*$hostinec1 + 150*$kostol1 + 200*$kasaren1 + 500*$hrad1)/1.25)+($row["xp"])/4;
                                       echo '<tr><td>'.$row["username"].' ['.$curentlevel.']</td>';
                                       echo '<td>'.$AlgoMX.'</td></tr>';
                                       if($najlepsihracscore<$AlgoMX)
                                       {
                                           $najlepsihracscore=$AlgoMX;
                                           $najlepsihracmeno = $row["username"];
                                       }
                                   }
                               }
                               $db->close();
                               echo '<center><h3> Najlepší hráč je '.$najlepsihracmeno.' so skóre '.$najlepsihracscore.'</h3></center>';
                                    ?>
                           </table>
                       </div>
                </center>
               </p>
               <h2>Zobraziť dedinu hráča</h2>
               <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                   <input type="text" placeholder="Zadaj meno hráča" name="dedina" />
                   <br />
                   <br />
                   <button name="dedinasubmit" type="submit">Zobraziť dedinu</button>
               </form>
            </div>

       </div><!-- /.container -->


           <!-- Bootstrap core JavaScript
    ================================================== -->
           <!-- Placed at the end of the document so the pages load faster -->
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
           <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
           <script src="assets/js/bootstrap.min.js"></script>

</body>
   