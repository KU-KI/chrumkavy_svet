<?php
include('session.php');
include('config.php');
session_start();
$experimental=$_SESSION['ID'];
$sql = "SELECT id, username, nickname, level, xp FROM account WHERE id='$experimental'";
$result = $db->query($sql);
//premenné
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $id=$row["id"]; $meno=$row["username"]; $nickname=$row["nickname"]; $level=$row["level"]; $xp=$row["xp"];
    }
}
$db->close();
?>