<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['cusername']);
unset($_SESSION['cpassword']);
header('location:index.php');
?>