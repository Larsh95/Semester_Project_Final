<?php
include '../vendor/autoload.php';

$email = $_POST["email"];
$message = $_POST["message"];

if (!isset($_POST["email"])) {
    header("Location: ../about.php?error=invalidemail");
} elseif (empty($email) || empty($message)) {
    header("Location: ../about.php?error=emptyinput");
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../about.php?error=invalidemail");
} else {
    mail("no-reply@feedme.coffee", "Contact inquiry", $message, "From: $email");
    header("Location: ../about.php?error=invalidemail");
}
