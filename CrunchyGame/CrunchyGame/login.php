<?php
include("config.php");
session_start();
$registration_avilable=true;

if (isset($_POST['login'])) {

    $myusername = mysqli_real_escape_string($db,$_POST['username']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']);
    // dekryptovanie hesla pred porovnanim
    $saltQuery = "SELECT salt FROM account WHERE username = '$myusername';";
    $result = mysqli_query($db,$saltQuery);
    $row = mysql_fetch_assoc($result);
    $salt = $row['salt'];
    //echo $salt.'<br>';
    $saltedPW = $mypassword.$salt;
    echo $saltedPW.'<br>';
    //$hashedPW = hash('sha256',$saltedPW);
    // porovnanie hesiel
    $sql = "SELECT id FROM account WHERE username = '$myusername' and password = '$salt'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);
    echo $count;


    if($count == 1) {
        $_SESSION['username'] = $myusername;
        $_SESSION['ID'] = $row['id'];
        $_SESSION['lvl'] = $row['level'];


        header("location: profile.php");
    }else {
        $error = "Vaše prihlasovacie meno alebo heslo niesú správne";
    }
}
elseif (isset($_POST['register'])) 
{

        if (isset($_POST['username']) && isset($_POST['password']))
        {
            if($registration_avilable)
            {
                $username = mysqli_real_escape_string($db,$_POST['username']);
                $password = mysqli_real_escape_string($db,$_POST['password']);
                $nickname = mysqli_real_escape_string($db,$_POST['nickname']);
                $salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
                $saltedPW =  $password . $salt;
                $hashedPW = hash('sha256', $saltedPW);                
                $query = "INSERT INTO account (id, username, password, salt, nickname, level, xp, avatar) VALUES (NULL,'$username','$hashedPW','$salt','$nickname',1,0,'default')";
                $result = mysqli_query($db, $query);
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
                $smsg= "REGISTRACIA JE UZATVORENA";
            }
        }
}
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