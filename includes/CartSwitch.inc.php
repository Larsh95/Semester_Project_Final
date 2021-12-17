<?php

use \DAO\Cart;

$cartController = new Cart();

if (isset($_SESSION["cartItem"])) {
    $cartController->existingCart($_SESSION["cartItem"]);
}
if (!empty($_GET["action"])) {
    if (isset($_GET['code'])) {
        $code = $_GET['code'];
    }

    //start the switch/case
    switch ($_GET["action"]) {
            //adding items to cart
        case "add":
            $cartController->cartAdd($code, $_POST["quantity"]);
            $_SESSION  = $cartController->itemArray;
            break;
            //Remove item from cart
        case "remove":
            $cartController->cartRemove($code);
            $_SESSION  = $cartController->itemArray;
            break;
            //Empty the entire cart
        case "empty":
            unset($_SESSION["cartItem"]);
            break;
    }
}
