<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webp2_07";

$kunden_name = $_POST['name'];
#$kunden_email = $_POST['email'];
$kunden_password = $_POST['password'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Verbindung erfolgreich! ";
    if ($_POST['name'] == $kunden_name && $_POST['password'] == $kunden_password) {
        echo "Login erfolgreich!";
    } else {
        echo "!!!ZUGANG VERWEIGERT!!!";
    }

} catch (PDOException $e) {
    echo "Verbindung fehlgeschlagen";
}