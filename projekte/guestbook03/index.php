<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guest Book 3</title>
</head>
<body>
    <div>
        <h1>Guest Book</h1>
        <hr>
            <?php
                $file = file('data.inc');

                if (is_array($file) && count($file) > 0) {
                    foreach ($file as $line) {
                        if (strpos($line, " || " > 0)) {
                        $str = explode(" || ", $line);
                        echo "<div><label>Author:</label>".$str[0]."</div>";
                        echo "<div><label>Email:</label>".$str[1]."</div>";
                        echo "<div><label>Message:</label>".$str[2]."</div>";
                        }
                    }
                }
            ?>
        ?>
    </div>
</body>
</html>
