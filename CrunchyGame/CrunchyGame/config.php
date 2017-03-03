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
$connectionInfo = array("UID" => "crunchygame@crunchygamedatabase", "pwd" => "Gameoftheyear2017", "Database" => "crunchygame", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:crunchygamedatabase.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>