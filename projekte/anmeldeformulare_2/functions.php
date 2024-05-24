<?php

function check_login() {

    // Wenn kein Benutzer in der Session ist, wird man über die header-Funktion zur login.php weitergeleitet und die aktuelle Session beendet
    if (!isset($_SESSION['hashed_user'])) {
        header("Location: login.php");
        die;
    }
    
}