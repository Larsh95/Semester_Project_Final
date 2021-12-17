<?php
include '../vendor/autoload.php';

use \Controllers\AboutContr;


if (isset($_POST['submit'])) { // Form has been submitted.

    // Grab the data! :)

    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $companya = $_POST['company1'];
    $companyb = $_POST['company2'];
    $cInfoa = $_POST['cInfo1'];
    $cInfob = $_POST['cInfo2'];
    $openHour = $_POST['openHour'];

    // instantiate User Controller Class! :)
    $updateAbout = new AboutContr($title, $subtitle, $companya, $companyb, $cInfoa, $cInfob, $openHour);
    // Running error handlers and create User! :)
    $updateAbout->aboutUpdate();
    // Go back to FP! :)
    header("Location: ../adminEditAbout.php?status=updatedAbout");
}
