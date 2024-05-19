<?php

?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style type="text/css">
    body {
        background-color: black;
    }

    #text {
        height: 25px;
        border-radius: 5px;
        padding: 4px;
        border: solid, thin #aaa;
    }

    #button {
        padding: 10px;
        width: 100px;
        color: white;
        background-color: lightblue;
        border: none;
    }

    #box {
        background-color: lightblue;
        margin: auto;
        width: 300px;
        padding: 20px;
    }
    </style>

    <div id="box">
        <form method="post">
            <div style="font-size: 20px; margin: 10px; color: white;">Anmelden</div>
            <input id="text" type="text" name="benutzer_name"><br><br>
            <input id="text" type="password" name="passwort"><br><br>

            <input id="button" type="submit" value="Login"><br><br>

            <a href="registrieren.php">Registrieren</a><br><br>
        </form>
    </div>
</body>

</html>