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
        include 'config.php';
        mysql_query("SHOW TABLES FROM crunchygame");
    ?>
</body>
</html>
