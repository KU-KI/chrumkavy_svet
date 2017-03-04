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
        $sql = "SELECT ID, Meno, Heslo FROM Accounts";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            }
        } else {
            echo "Žiadne účty neboli nájdené";
        }
        $conn->close();
    ?>
    ?>
</body>
</html>
