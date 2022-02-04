<?php
session_start();
if ($_SESSION['a_loggedin'] != true || !isset($_SESSION['a_loggedin'])) {
    header("location:login.php");
}
include '../partial/_config.php';
$eventid = $_GET['eventid'];
$sql = "delete from events_tbl where eventid = ".$eventid;
$result = $conn->query($sql);
if($result)
{
    header("location:events.php");
}
?>