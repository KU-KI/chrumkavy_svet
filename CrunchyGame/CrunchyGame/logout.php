<?php
// Súbor ktorý vymaše údaje session.php
session_start();

if(session_destroy()) {
    header("Location: index.php");
}
?>