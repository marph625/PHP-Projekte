<?php

session_start();

if (isset($_SESSION['benutzer_id'])) {
    unset($_SESSION['benutzer_id']);
}

// Nach Abmeldung wird der Benutzer wieder auf anmelden.php weitergeleitet
header("Location: anmelden.php");
die;
