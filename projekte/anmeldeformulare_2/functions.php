<?php

function check_login() {

    // Wenn der Benutzer nicht in der Session ist, wird er zur login.php weitergeleitet
    if (!isset($_SESSION['hashed_user'])) {
        header("Location: login.php");
        die;
    }
    
}