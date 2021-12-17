<?php
include '../vendor/autoload.php';

use \Controllers\UserContr;

if (isset($_POST['submit'])) { // Form has been submitted.

    // Grab the data! :)

    $user = $_POST['userName'];
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $rank = $_POST['rank'];

    // instantiate User Controller Class! :)
    $addUser = new UserContr($user, $fname, $lname, $pass, $email, $rank);
    // Running error handlers and create User! :)
    $addUser->addUser();
    // Go back to FP! :)
    header("Location: ../adminUsers.php?status=added");
}
