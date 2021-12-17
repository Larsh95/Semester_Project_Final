<?php
include '../vendor/autoload.php';
use \Controllers\UserUpdateContr;
if (isset($_POST['userID']) && isset($_POST['submit'])) {

    // Grab the data! :)

    $user = $_POST['userName'];
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $email = $_POST['email'];
    $id = $_POST['userID'];

    // instantiate User Update Controller Class! :)
    $upUser = new UserUpdateContr($user, $fname, $lname, $email, $id);
    // Running error handlers and user update! :)
    $upUser->updateUser();
    // Go back to FP! :)
    header("Location: ../adminUsers.php?status=updated&id=$id");
}

    
    