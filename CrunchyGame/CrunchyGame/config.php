<?php
// Algoritmus priamo od Microsoftu na pripojenie do ich databázy
$connectstr_dbhost = '';
$connectstr_dbname = '';
$connectstr_dbusername = '';
$connectstr_dbpassword = '';

foreach ($_SERVER as $key => $value) {
    if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
        continue;
    }
    // premenné ktoré sa nahradia platnými údajmi
    $connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
    $connectstr_dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
    $connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
    $connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
}
    // definovanie globálnych premenných na pripájanie do databázy
    define('DB_SERVER', $connectstr_dbhost);
    define('DB_USERNAME', $connectstr_dbusername);
    define('DB_PASSWORD', $connectstr_dbpassword);
    define('DB_DATABASE', $connectstr_dbname);
    // Nadviazanie spojenia s databázov
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    // Používanie UTF-8 pri pripojení do databázy pre špeciálne znaky v Slovenèine
    $db->set_charset("utf8");
?>