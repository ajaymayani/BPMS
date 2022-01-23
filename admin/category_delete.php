<?php

include '../partial/_config.php';
$id = $_GET['id'];
$sql = "delete from books_category_tbl where id = ".$id;
$result = $conn->query($sql);
if($result)
{
    header("location:add_category.php");
}
?>