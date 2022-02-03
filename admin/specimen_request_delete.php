<?php

include '../partial/_config.php';
$request_id = $_GET['request_id'];
$sql = "delete from specimen_req_tbl where request_id = ".$request_id;
$result = $conn->query($sql);
if($result)
{
    header("location:specimen_request.php");
}
?>