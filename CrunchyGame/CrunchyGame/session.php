<?php
include('config.php');
session_start();

$user_check = $_SESSION['username'];

$ses_sql = mysqli_query($db,"select username from account where username = '$user_check' ");

$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$username = $row['username'];

if(!isset($_SESSION['login_user'])){
    header("location:login.php");
}
?>