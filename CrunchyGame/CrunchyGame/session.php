<?php
// In�tancia alebo session (posedenie)
// Prilinkovanie datab�zy
include('config.php');
session_start();
// Na��tanie mena u�ivate�a
$user_check = $_SESSION['username'];
// Na��tanie pou��vate�a pod�a mena z datab�zy
$ses_sql = mysqli_query($db,"select username from account where username = '$user_check' ");

$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
// nastavenie premennej username z datab�zy
$username = $row['username'];
// Ak sa nepodarilo ziskat meno uzivatela z databazy znamena to ze nebol prihl�sen� a bude presmerovan� na prihl�senie
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
?>