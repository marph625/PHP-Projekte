<?php
// Startet die Session einmal und bindet functions.php und classes.php ein
// init.php wird in signup.php, login.php, logout.php und index.php eingebunden
session_start();

require "functions.php";
require "classes.php";