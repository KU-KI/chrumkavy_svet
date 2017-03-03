<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Prihlásenie do CrunchyGame</title>
  
  
  
      <link rel="stylesheet" href="assets/css/style.css">

  
</head>

<body>
  <div class="login-page">
  <div class="form">
    <form class="register-form">
      <input type="text" placeholder="Používateľské meno"/>
      <input type="password" placeholder="Heslo"/>
      <input type="text" placeholder="Emailová adresa"/>
      <button>Vytvoriť Účet</button>
      <p class="message">Už si registrovaný ? <a href="#"> Prihlás sa</a></p>
    </form>
    <form class="login-form">
      <input type="text" placeholder="Používateľské meno"/>
      <input type="password" placeholder="Heslo"/>
      <button>Prihlásiť sa</button>
      <p class="message">Niesi zaregistrovaný ?<a href="#"> Vytvoriť Účet</a></p>
    </form>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="assets/js/index.js"></script>
    <?php
    // PHP Data Objects(PDO) Sample Code:
    try {
    $conn = new PDO("sqlsrv:server = tcp:crunchygamedatabase.database.windows.net,1433; Database = crunchygame", "crunchygame", "Gameoftheyear2017");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
    }

    // SQL Server Extension Sample Code:
    $connectionInfo = array("UID" => "crunchygame@crunchygamedatabase", "pwd" => "{your_password_here}", "Database" => "crunchygame", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
    $serverName = "tcp:crunchygamedatabase.database.windows.net,1433";
    $conn = sqlsrv_connect($serverName, $connectionInfo);
    ?>
</body>
</html>
