<?php

session_start();

if (isset($_SESSION['benutzer_id'])) {
    unset($_SESSION['benutzer_id']);
}

header("Location: anmelden.php");
die;