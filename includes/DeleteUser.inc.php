<?php
include '../vendor/autoload.php';
use \DAO\Admin;
if (isset($_GET['id'])) {

    $id = $_GET['id'];
    
// instantiate Signup Controller Class! :)
    // include '../classes/dbcon.class.php';
    // include '../classes/admin.class.php';
    // include '../classes/admin-contr.class.php';
    $delUser = new Admin();
    // Running error handlers and user signup! :)
    $delUser->delUser();
    // Go back to FP! :)
    header("Location: ../adminUsers.php?status=deleted&id=$id");
}