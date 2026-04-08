<?php

$hostName = "localhost:3310";
$dbUser = "root";
$dbPassword = "";
$dbName = "pj";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}
