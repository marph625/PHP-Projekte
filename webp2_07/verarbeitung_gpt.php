<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webp2_07";

if (isset($_POST['name'], $_POST['email'], $_POST['password'])) {
    $kunden_name = $_POST['name'];
    $kunden_email = $_POST['email'];
    // Hash Algorithmus für Passwörter
    $kunden_password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Verbindung erfolgreich! ";
        // Einfache Hochkommata sind notwendig, sonst droht Leid
        $stmt = $conn->prepare("INSERT INTO kunden (name, email, password) VALUES (:name, :email, :password);");
        $stmt->bindParam(':name', $kunden_name);
        $stmt->bindParam(':email', $kunden_email);
        $stmt->bindParam(':password', $kunden_password);
        $stmt->execute();

        echo "Neuer Eintrag hinzugefügt";

        // Tabelle
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>id</th><th>name</th><th>email</th><th>password</th></tr>";

        $select = $conn->prepare("SELECT * FROM kunden;");
        $select->execute();
        while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td style='width: 150px; border: 1px solid black'>$value</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } catch (PDOException $e) {
        echo "Fehler: ".$e->getMessage();
    }

} else {
    echo "Bitte alle erforderlichen Felder ausfüllen.";
}
?>