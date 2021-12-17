<?php
include '../vendor/autoload.php';
use DAO\Product;

if (isset($_GET['ProductID'])) {

    $id = $_GET['ProductID'];
    
// instantiate Signup Controller Class! :)
    // include '../classes/dbcon.class.php';
    // include '../classes/admin.class.php';
    // include '../classes/admin-contr.class.php';
    $delProduct = new Product();
    // Running error handlers and user signup! :)
    $delProduct->delProduct();
    // Go back to FP! :)
    header("Location: ../adminProducts.php?status=pDeleted&id=$id");
}