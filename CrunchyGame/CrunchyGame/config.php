<?php
// PHP Data Objects(PDO) Sample Code:
/*
try {
    $conn = new PDO("sqlsrv:server = tcp:crunchygamedatabase.database.windows.net,1433; Database = crunchygame", "crunchygame", "Gameoftheyear2017");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
if($conn == true){
    print("Hurá si pripojený :D");
    $premenna = "ahoj svet";
}

*/
/*// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "crunchygame@crunchygamedatabase", "pwd" => "Gameoftheyear2017", "Database" => "crunchygame", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:crunchygamedatabase.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);*/
$mysqli = new mysqli("tcp:crunchygamedatabase.database.windows.net,1433", "crunchygame", "Gameoftheyear2017", "crunchygame");
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
/*$mysqli->query("CREATE TEMPORARY TABLE myCity LIKE City");
$city = "'s Hertogenbosch";
/* this query will fail, cause we didn't escape $city *//*
if (!$mysqli->query("INSERT into myCity (Name) VALUES ('$city')")) {
    printf("Error: %s\n", $mysqli->sqlstate);
}
$city = $mysqli->real_escape_string($city);
/* this query with escaped $city will work *//*
if ($mysqli->query("INSERT into myCity (Name) VALUES ('$city')")) {
    printf("%d Row inserted.\n", $mysqli->affected_rows);
}*/
$mysqli->close();
?>
