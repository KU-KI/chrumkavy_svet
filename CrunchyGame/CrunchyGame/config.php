<?php
// Algoritmus priamo od Microsoftu na pripojenie do ich datab�zy
$connectstr_dbhost = '';
$connectstr_dbname = '';
$connectstr_dbusername = '';
$connectstr_dbpassword = '';

foreach ($_SERVER as $key => $value) {
    if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
        continue;
    }
    // premenn� ktor� sa nahradia platn�mi �dajmi
    $connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
    $connectstr_dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
    $connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
    $connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
}
    // definovanie glob�lnych premenn�ch na prip�janie do datab�zy
    define('DB_SERVER', $connectstr_dbhost);
    define('DB_USERNAME', $connectstr_dbusername);
    define('DB_PASSWORD', $connectstr_dbpassword);
    define('DB_DATABASE', $connectstr_dbname);
    // Nadviazanie spojenia s datab�zov
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    // Pou��vanie UTF-8 pri pripojen� do datab�zy pre �peci�lne znaky v Sloven�ine
    $db->set_charset("utf8");
?>