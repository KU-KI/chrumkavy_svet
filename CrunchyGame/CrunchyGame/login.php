<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Prihlásenie do CrunchyGame</title>
  
  
  
      <link rel="stylesheet" href="assets/css/style.css">
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
        echo "Registrované Účty";
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>ID</th><th>MENO</th></tr>";

        class TableRows extends RecursiveIteratorIterator {
            function __construct($it) {
                parent::__construct($it, self::LEAVES_ONLY);
            }

            function current() {
                return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
            }

            function beginChildren() {
                echo "<tr>";
            }

            function endChildren() {
                echo "</tr>" . "\n";
            }
        }

        try {
            $stmt = $conn->prepare("SELECT ID, Meno FROM Accounts");
            $stmt->execute();

            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                echo $v;
            }
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        echo "</table>";
    ?>
</body>
</html>
