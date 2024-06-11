<?php
$message = null;
require_once("process.php");
?>

<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Submit Message</title>
</head>
<body>
    <div>
        <?php
        if ($message) {
            echo $message;
        }
        ?>
        ?>
        <form action="" method="post">
            <p><input type="name" name="name" placeholder="Type your name"></p>
            <p><input type="email" name="email" placeholder="Type your email"></p>
            <p><textarea name="message" placeholder="Type a message"></textarea></p>
            <p><input type="submit" value="Submit Message"></p>
            <input type="hidden" name="submitted" value="1">
        </form>
    </div>
</body>
</html>