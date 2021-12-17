<?php
include '../vendor/autoload.php';
if (isset($_POST['submit'])) { // Form has been submitted.

    // Grab the data! :)
    $email = $_POST['email'];

    // instantiate Signup Controller Class! :)
    $add = new \Controllers\SubsContr($email);
    // Running error handlers and user signup! :)
    $add->addSub();
    // Go back to FP! :)
    header("Location: ../index.php?error=none");
}
