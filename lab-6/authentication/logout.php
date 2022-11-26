<?php
session_start();
session_unset(); 
// destroy the session 
session_destroy(); 
setcookie("user", "", time() - 3600);
header("Location: ../index.php?page=home");
?>