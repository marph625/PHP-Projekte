<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webp2_07";

$kunden_name = $_POST['name'];
$kunden_email = $_POST['email'];
$kunden_password = $_POST['password'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Verbindung erfolgreich!";
    // Einfache Hochkommata sind notwendig, sonst droht Leid
    $sql = "INSERT INTO kunden (name, email, password) VALUES ('$kunden_name', '$kunden_email', '$kunden_password');";
    // try-Block innerhalb des try-Blocks
    try {
        // use exec because no results are returned
        $conn->exec($sql);
        echo "Neuer Eintrag hinzugefügt!";
    }
    catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
} catch (PDOException $e) {
    echo "Verbindung fehlgeschlagen";
}

$conn = null; 