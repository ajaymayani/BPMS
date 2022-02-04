<?php

session_start();
if ($_SESSION['a_loggedin'] != true || !isset($_SESSION['a_loggedin'])) {
    header("location:login.php");
}

include '../partial/_config.php';
$proposalid = $_GET['proposalid'];
$sql = "delete from author_proposal_tbl where proposalid = ".$proposalid;
$result = $conn->query($sql);
if($result)
{
    header("location:author_proposal.php");
}
?>