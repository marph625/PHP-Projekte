<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "login_muster_db";
$tablename = "benutzer";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname)) {
    die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
}
