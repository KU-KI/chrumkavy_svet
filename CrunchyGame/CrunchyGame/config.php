<?php
try {
    $conn = new PDO("sqlsrv:server = tcp:crunchygamedatabase.database.windows.net,1433; Database = crunchygame", "crunchygame", "Gameoftheyear2017");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Chyba pri pokuse o nadviazanie spojenia s databazov");
    die(print_r($e));
}
if($conn == true){
    print("Pripojenie nadviazane</br>");
}
?>