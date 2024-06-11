<?php

if (!isset($_POST['submitted'])) {
    return;
}
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];


$data = $name . " || " . $email . " || " . $message . "\n\r";

$filePointer = fopen('data.inc', 'a');

fwrite($filePointer, $data);
fclose($filePointer);

$message = "Message submitted successfully!";