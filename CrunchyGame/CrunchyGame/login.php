<?php
// Prilinkovanie konfiguracneho subora ktory povoluje pristup do databazy
include("config.php");
session_start();
// Povolenie/zakazanie registracii pouzivatelov -> mozne pouzit ako nastavenie pre admina
$registration_avilable=true;
// ak sa pouzivatel pokusa prihlasit spusti sa nasledovne po stlaceni tlacidla prihlasit
if (isset($_POST['login'])) {
    // zabezpečeným spôsobom sa preberu udaje do premenných
    $myusername = mysqli_real_escape_string($db,$_POST['username']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']);
    // dekryptovanie hesla pred porovnanim
    $saltQuery = "SELECT salt FROM account WHERE username = '$myusername';";
    $result = mysqli_query($db,$saltQuery);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    // do premennej salt sa načíta riadok z tabulky salt
    $salt = $row['salt'];
    // samotná dekryptacia
    $saltedPW = $mypassword.$salt;
    // rekryptácia a porovnanie s databazou
    $hashedPW = hash('sha256', $saltedPW); 
    // porovnanie hesiel
    $sql = "SELECT id FROM account WHERE username = '$myusername' and password = '$hashedPW'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    // Výber aktívneho riadku
    $active = $row['active'];
    // Zistí kolko aktívnych riadkov bolo vybraných
    $count = mysqli_num_rows($result);

    // Ak existuje len jeden riadok prihlási používatela, ak je ich viac nie
    if($count == 1) {
        // Nastaví do inštancie údaje z prihlasovania na zaklade ktorých zistíme kto sa prihlásil
        $_SESSION['username'] = $myusername;
        $_SESSION['ID'] = $row['id'];
        $_SESSION['lvl'] = $row['level'];

        // Presunie uzivatela na lokalitu profile.php
        header("location: profile.php");
    }else {
        // Nastaví premennú $fmsg ktorá sa neskôr vypíše na konkrétnom mieste v HTML vhodné na formátovanie
        $fmsg = "Vaše prihlasovacie meno alebo heslo niesú správne";
    }
}
// Ak sa používateľ chce registrovať a stlačí tlačidlo registrovať spustí sa následovné
elseif (isset($_POST['register'])) 
{
        // Ak je nastavené a zadané niečo v políčkach meno aj heslo
        if (isset($_POST['username']) && isset($_POST['password']))
        {
            // Ak je registrácia povolená
            if($registration_avilable)
            {
                // Bezpečné escape prebratie premenných z políčok
                $username = mysqli_real_escape_string($db,$_POST['username']);
                $password = mysqli_real_escape_string($db,$_POST['password']);
                $nickname = mysqli_real_escape_string($db,$_POST['nickname']);
                // Vygenerovanie salt hash hesla
                $salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
                // Spojenie hesla zadaneho v policku heslo a random saltu
                $saltedPW =  $password . $salt;
                // Hashovanie hesla
                $hashedPW = hash('sha256', $saltedPW);    
                // Vloženie nového uživateľa do databázy
                $query = "INSERT INTO account (id, username, password, salt, nickname, level, xp, avatar) VALUES (NULL,'$username','$hashedPW','$salt','$nickname',1,0,'default')";
                $result = mysqli_query($db, $query);
                // ak $result = true else $result = false teda výsledok uspesny alebo neuspesny smsg= success message, fmsg = fail message
                if($result)
                {
                    $smsg = "Účet vytvorený úspešne";
                }
                else
                {
                    $fmsg ="Registrácia účtu zlyhala";
                }
            }
            else
            {
                // Ak je premenná $registration_avilable nastavena na false registracia nieje možná
                $smsg= "REGISTRACIA JE UZATVORENA";
            }
        }
}
$db->close();
?>
<!DOCTYPE html>

<head>

    <meta charset="UTF-8" />

    <title>Prihlásenie do CrunchyGame</title>







    <link rel="stylesheet" href="assets/css/style.css" />

    <style>
        body {
            text-align: center;
        }



        #wrapper {
            margin: 0 auto;
            width: 900px;
            text-align: left;
        }
    </style>

</head>
<div class="login-page">
    <div class="form">

        <form class="register-form" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

            <input type="text" placeholder="Používateľské meno" name="username"/>

            <input type="password" placeholder="Heslo" name="password" />

			<input type="text" placeholder="Nickname" name="nickname" />

            <button name="register" type="submit">Vytvoriť Účet</button>

            <p class="message">Už si registrovaný ? <a href="#"> Prihlás sa</a></p>

        </form>



        <form class="login-form" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

		<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
		<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>

            <input type="text" placeholder="Meno účtu" name="username" />

            <input type="password" placeholder="Heslo" name="password" />

            <button name="login" type="submit">Prihlásiť sa</button>

            <p class="message">Niesi zaregistrovaný ? <a href="#">Vytvoriť Účet</a>

            </p>

        </form>

    </div>

</div>

<body>
</body>

</html>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<p id="demo"></p>

<script src="assets/js/index.js"></script>