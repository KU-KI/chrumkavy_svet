<?php
/*try {
    $conn = new PDO("sqlsrv:server = tcp:crunchygamedatabase.database.windows.net,1433; Database = crunchygame", "crunchygame", "Gameoftheyear2017");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Chyba pri pokuse o nadviazanie spojenia s databazov");
    die(print_r($e));
}
if($conn == true){
    print("Pripojenie nadviazane</br>");
}*/
$servername = "tcp:crunchygamedatabase.database.windows.net,1433";
$username = "crunchygame";
$password = "Gameoftheyear2017";
$dbname = "crunchygame";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>