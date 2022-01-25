<?php

include '../partial/_config.php';
$eventid = $_GET['eventid'];
$sql = "delete from events_tbl where eventid = ".$eventid;
$result = $conn->query($sql);
if($result)
{
    header("location:events.php");
}
?>