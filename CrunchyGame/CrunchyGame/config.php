<?php
/*try {
    $conn = new PDO("sqlsrv:server = tcp:crunchygamedatabase.database.windows.net,1433; Database = crunchygame", "crunchygame", "Gameoftheyear2017");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Chyba pri nadvezovani spojenia</br>");
    die(print_r($e));
}
if($conn == true){
    print("Spojenie nadviazane</br>");
}*/
    define('DB_SERVER', 'tcp:crunchygamedatabase.database.windows.net:1433');
    define('DB_USERNAME', 'crunchygame');
    define('DB_PASSWORD', 'Gameoftheyear2017');
    define('DB_DATABASE', 'crunchygame');
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>