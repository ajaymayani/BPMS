<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PublishersDB";

$conn = new mysqli($servername,$username,$password,$dbname);

if(!$conn)
{
    die("Error:".$conn->connect_error);
}
