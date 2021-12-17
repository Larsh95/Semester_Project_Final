<?php
require '../vendor/autoload.php';
use \Controllers\LoginContr;


if (isset($_POST['submit'])) { // Form has been submitted.

    // Grab the data! :)

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    // instantiate Login Controller Class! :)
    $login = new LoginContr($user, $pass);
    // Running error handlers and user login! :)
    $login->loginUser();

    // Go back to FP! :)
    header("Location: ../index.php?error=none");
}