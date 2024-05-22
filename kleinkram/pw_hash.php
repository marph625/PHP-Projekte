<?php

$password = "hello";
$hashed_password_default = password_hash($password, PASSWORD_DEFAULT);
$hashed_password_bcrypt = password_hash($password, PASSWORD_BCRYPT);

echo "Password: " . $password;
echo "\nHashed Password: " . $hashed_password_default;
echo "\nHashed Password: " . $hashed_password_bcrypt;

$decrypted_password_default = password_verify($password, $hashed_password_default);
$decrypted_password_bcrypt = password_verify($password, $hashed_password_bcrypt);

echo "\nDecrypted Password_default: " . $decrypted_password_default;
echo "\nDecrypted Password_bcrypt: " . $decrypted_password_bcrypt;
