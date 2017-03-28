<?php
include("config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $myusername = mysqli_real_escape_string($db,$_POST['username']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']);

    $sql = "SELECT id FROM account WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if($count == 1) {
        $_SESSION['username'] = $myusername;
        $_SESSION['login_user'] = $myusername;

        header("location: profile.php");
    }else {
        $error = "Vaše prihlasovacie meno alebo heslo niesú správne";
    }
}
?>
<!DOCTYPE html>

<html>

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

        <form class="register-form">

            <input type="text" placeholder="Používateľské meno" />

            <input type="password" placeholder="Heslo" />

            <button>Vytvoriť Účet</button>

            <p class="message">Už si registrovaný ? <a href="#"> Prihlás sa</a></p>

        </form>



        <form class="login-form" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

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