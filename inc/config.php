<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "realtime_chat";

$connect = mysqli_connect($hostname, $username, $password, $database);

if($connect->connect_error)
{
    die("Database Connection Error  :".$connect->connect_error);
}
