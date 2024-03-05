<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webp2_07";
$tablename = "kunden";

$kunden_name = $_POST['name'];
$kunden_password = $_POST['password'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Verbindung erfolgreich! ";

    $select = $conn->prepare("SELECT * FROM $tablename WHERE name = '$kunden_name'");
    $select->execute();

    $result = $select->setFetchMode(PDO::FETCH_ASSOC);

    $dbFetch = $select->fetchAll();
    $dbName = $dbFetch[0]['name'];
    $dbPassword = $dbFetch[0]['password'];



    if ($kunden_name == $dbName && password_verify($kunden_password, $dbPassword)) {
        echo "Login erfolgreich!";
    } else {
        echo "!!!ZUGANG VERWEIGERT!!!";
    }



} catch (PDOException $e) {
    echo "Verbindung fehlgeschlagen";
}