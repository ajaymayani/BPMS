<?php
session_start();
if ($_SESSION['a_loggedin'] != true || !isset($_SESSION['a_loggedin'])) {
    header("location:login.php");
}
session_unset();
session_destroy();
header("location:login.php");
?>