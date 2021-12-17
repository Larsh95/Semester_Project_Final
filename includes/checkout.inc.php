<?php
include '../vendor/autoload.php';

if (isset($_POST['submit'])) { // Form has been submitted.

    // Grab the data! :)

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $postCode = $_POST['postalCode'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $phoneNum = $_POST['phoneNum'];
    $userID = $_POST['userID'];
    $totalPrice = $_POST['totalPrice'];
    $pItems = $_POST['pItems'];
    $status = "waiting";


    // instantiate Signup Controller Class! :)
    $Checkout = new Controllers\CheckoutContr($fname, $lname, $email, $postCode, $city, $address, $phoneNum, $userID, $totalPrice, $pItems, $status);
    // Running error handlers and user signup! :)
    $Checkout->orderCheckout();
    // Go back to FP! :)

    header("Location: ../pay.php?code=" . $email);
}
