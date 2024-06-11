<?php
$email = $_POST["email"];
$password = $_POST["password"];

$users = file("users.txt");
foreach($users as $user) {
    $user_info = explode(";", $user);
    if($user_info[0] == $email && $user_info[1] == $password) {
        echo "Hallo ".$user_info[2];
    }
}