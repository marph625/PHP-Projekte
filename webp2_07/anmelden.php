<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
</head>

<body>
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
            echo "Verbindung erfolgreich!<br>";

            $select = $conn->prepare("SELECT * FROM $tablename WHERE name = '$kunden_name'");
            $select->execute();

            $result = $select->setFetchMode(PDO::FETCH_ASSOC);

            $dbFetch = $select->fetchAll();
            $dbName = $dbFetch[0]['name'];
            $dbPassword = $dbFetch[0]['password'];
            $dbKundenId = $dbFetch[0]['id'];



            if ($kunden_name == $dbName && password_verify($kunden_password, $dbPassword)) {
                echo "<!DOCTYPE html>";
                echo "<html lang='de'>";
                echo "<head>";
                echo     "<meta charset='UTF-8'>";
                echo     "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
                echo     "<title>Login</title>";
                echo "</head>";
                echo "<body>";
                echo     "<form action='verarbeitung.php' method='post'>";
                echo         "<input type='text' name='description'>Beschreibung<br>";
                echo         "<input type='file' name='file'>Datei<br>";
                echo         "<button type='submit'>Datei hochladen</button><br>";
                echo     "</form>";
                echo "</body>";
                echo "</html>";             


            } else {
                // Formular taucht trotzdem auf, was noch gefixt werden muss
                echo "!!!ZUGANG VERWEIGERT!!!<br>";
            }



        } catch (PDOException $e) {
            echo "Verbindung fehlgeschlagen<br>";
        }
    ?>
</body>

</html>