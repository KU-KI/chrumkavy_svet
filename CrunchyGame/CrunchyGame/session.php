<?php
// Inštancia alebo session (posedenie)
// Prilinkovanie databázy
include('config.php');
session_start();
// Naèítanie mena uživate¾a
$user_check = $_SESSION['username'];
// Naèítanie používate¾a pod¾a mena z databázy
$ses_sql = mysqli_query($db,"select username from account where username = '$user_check' ");

$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
// nastavenie premennej username z databázy
$username = $row['username'];
// Ak sa nepodarilo ziskat meno uzivatela z databazy znamena to ze nebol prihlásený a bude presmerovaný na prihlásenie
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
?>