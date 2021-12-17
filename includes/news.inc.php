<?php
include '../vendor/autoload.php';

use \Controllers\NewsContr;


if (isset($_POST['submit'])) { // Form has been submitted.

    // Grab the data! :)

    $newsID = $_POST['newsID'];
    $ProductID = $_POST['ProductID'];
    $maintitle = $_POST['maintitle'];
    $newsTitle = $_POST['newsTitle'];


    //instantiate User Controller Class! :)
    $updateAbout = new NewsContr($newsID, $ProductID, $maintitle, $newsTitle);
    // Running error handlers and create User! :)
    $updateAbout->newsUpdate();

    header('Location: ../adminNews.php?status=updatedNews');
}
