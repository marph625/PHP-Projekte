<?php

require "init.php";

// Wenn es einen Benutzer in der Session gibt, soll er entfernt werden
// Anschließend wird man zur login.php weitergeleitet und die Session wird beendet
if (isset($_SESSION['verified_user'])) {
    unset($_SESSION['verified_user']);
}

header("Location: login.php");
die;