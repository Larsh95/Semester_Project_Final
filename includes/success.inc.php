<?php
session_start();
include '../vendor/autoload.php';



if (isset($_POST['submit'])) { // Form has been submitted.

    // Grab the data! :)
    $id = $_POST['orderID'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $postCode = $_POST['postCode'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $phoneNum = $_POST['phoneNum'];
    $paidAmount = $_POST['paidAmount'];
    $pItem = $_POST['pItem'];


    $pItems = unserialize($pItem);
    // instantiate Signup Controller Class! :)
    $update = new \DAO\Checkout();
    // Running error handlers and user signup! :)
    $update->updateOrder($id);
    // Go back to FP! 
    $data = '';
    foreach ($pItems as $item) {
        $data .= 'Product Name: ';
        $data .= $item["name"];
        $data .= "\r\n";
        $data .= 'Product #';
        $data .= $item["code"];
        $data .= "\r\n";
        $data .= 'Amount Ordered: ';
        $data .= $item["quantity"];
        $data .= "\r\n";
        $data .= 'Product Price: ';
        $data .= $item["price"];
        $data .= ' dkk';
        $data .= "\r\n";
        $data .= '<br>';
    }

    $to = $email;
    $subject = 'Invoice for order #' . $id;
    $from = 'no-reply@feedme.coffee';

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: ' . $from . "\r\n";

    $message .= '<h2>Thank you for shopping at Wine-Time, ' . $first_name . ' ' . $last_name . '!</h2></br>' . "\r\n";
    $message .= '<h3>The products you have ordered are:</h3>' . "\r\n";
    $message .= '<pre>';
    $message .= $data;
    $message .= '</pre>';
    $message .= 'The total amount paid:' . "\r\n";
    $message .= $paidAmount . ' dkk' . "\r\n";

    var_dump($message);

    if (mail($to, $subject, $message, $headers)) {
        unset($_SESSION["cartItem"]);
        header("Location: ../success.php?code=success");
    } else {
        unset($_SESSION["cartItem"]);
        header("Location: ../success.php?code=notSuccess");
    }
}
