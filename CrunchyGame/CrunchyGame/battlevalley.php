<?php
// prilinkovanie súborov s dátami
include('session.php');
include('data.php');
include('config.php');
// spustenie inštancie session
session_start();
// náhodné generovanie čísla pre nahodny vyber otazky
$nahoda=rand(1, 31);
// Predidenie opakovaniu tej istej otázky hneď po sebe cyklus bezi kým generovane cislo neni ine ako to predosle ktore sa nacita z cookies
while($nahoda==$_COOKIE['nahodnecislo'])
{
    $nahoda=rand(1, 31);
}
// Vybere otazku a jej moznosti z databazy na zaklade ID ktore je nahodne generovane algoritmom vyššie
$sql = "SELECT otazka, prva, druha, tretia, spravna FROM otazky WHERE id='$nahoda'";
// spustí Query ktorý vyhladá údaje v databáze
$result = $db->query($sql);

// Ak sa našla aspoň jedna otázka jedna hodnota načíta do premenných $otazka, $prva atď. údaje ktoré neskôr použijeme pri výpise na obrazovku
if ($result->num_rows > 0)
{
    // pokiaľ by bolo otázok viac ako 1 vybere poslednú, aby sa predošlo chybe
    while($row = $result->fetch_assoc())
    {
        $otazka=$row["otazka"]; $prva=$row["prva"]; $druha=$row["druha"]; $tretia=$row["tretia"]; $spravna=$row["spravna"];
    }
}
// Ak bolo stlacene tlacitlo odoslat na kontrolu algoritmus spusti overenie spravnosti
if(isset($_POST['odoslat']))
{
    // Ak sa odpoveď zhoduje so správnou odpoveďou ktorá je kôli reloadu uložená v cookies tak spusť algoritmus
    if($_POST["otazka"]==$_COOKIE['Cookie'])
    {
        // Pokiaľ nieje level väčší ako 30 to by už prekročil limit
        if($level<30)
        {
            // ziskavanie XP algoritmus -->C#ndition
            $AlgoMX = (70*$radnica + 90*$veza + 120*$hostinec + 150*$kostol + 200*$kasaren + 500*$hrad)/1.25;
            // Náhodné vygenerovanie skúsenostných bodov z algoritmu vyššie ktorý sa zakladá na úrovni budov v dedine
            $X = rand($AlgoMX/2,$AlgoMX);
            // Výpis na vrchu obrazovky ktorý informuje hráča o počte získaných bodov
            echo '<center>Správne! Získavate '.$X.' skúsenostných bodov</center>';
            // Algoritmus na pričítanie skúsenostných bodov pre databázu
            $pricitaj=$X+$xp;
            // Nahradí skúsenostné body ktoré mal hráč premennou $pricitaj
            $sql = "UPDATE account SET xp ='$pricitaj' WHERE id='$id'";
            // Spustí Query ktorý vloži údaje do databázy pomocou premennej databázy $db
            mysqli_query($db, $sql);
            // Ak je hodnota vyššia ako je potrebná na získanie novej úrovne spustí sa následovné
            if($pricitaj>$xpreq)
            {
                // Pričíta sa level
                $newlvl = $level+1;
                // Nahrá sa do databázy nová úroveň
                echo '<center>Gratulujeme pokročili ste na dalšiu úroveň, vaša dedina sa rozrástla!</center>';
                $sql = "UPDATE account SET level ='$newlvl' WHERE id='$id'";
                mysqli_query($db, $sql);
                // odčítajú sa skúsenostné body od potrebných na získanie novej úrovne a nahrá sa nový počet do databázy
                $pricitaj-=$xpreq;
                $sql = "UPDATE account SET xp ='$pricitaj' WHERE id='$id'";
                mysqli_query($db, $sql);
                // Progress bar, teda bežec ktorý zobrazuje koľko skúsenostných bodov je ešte potrebných do získania novej úrovne
                $progress=100*($xp/$xpreq);
                echo '<div class="progress">
                   <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $xp;?>"
                       aria-valuemin="0" aria-valuemax="100" style="width:'.(100*($pricitaj/$xpreq)).'%"><center>'.$xp.'/'.$xpreq.' skúsenostných bodov</center></div>
                </div>';
            }
            else
            {
                // To isté len sa spustí aj v pripade ze hrac neziskal novu uroven
                $progress=100*($xp/$xpreq);
                echo '<div class="progress">
                   <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $xp;?>"
                       aria-valuemin="0" aria-valuemax="100" style="width:'.(100*($xp/$xpreq)).'%"><center>'.$xp.'/'.$xpreq.' skúsenostných bodov</center></div>
                </div>';
            }
        }
    }
    else
    {
        // Ak odpoveď nieje správna spustí sa vetva else
        echo '<center>nesprávne</center>';
    }
}
//  nastavenie cookies čo sa hodí pri refreshovaní stránky, údaje ostanú zapísané
setcookie("Cookie", $spravna);
setcookie("nahodnecislo", $nahoda);
$db->close();
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
                           <?php
                           //Prehodenie poradia otazok
                           $numbers = array($prva,$druha,$tretia,$spravna);
                           shuffle($numbers);
                           foreach ($numbers as $number) {
                               // vypis jednotlivých klikacich tlacidiel pre otazky tak aby sa dalo vyberat
                               echo '<input type="radio" name="otazka" value="'.$number.'" /> '.$number.'<br /><br />';
                           }
                           ?>
                       </h4>
                       <br />
                       <button type="submit" class="btn btn-danger" button name="odoslat">Odoslať odpoveď</button>
                       <h5>Zvoľ prosím odpoveď ktorú považuješ za správnu</h5>
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
   