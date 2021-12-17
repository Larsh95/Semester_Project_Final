<?php
include '../vendor/autoload.php';
use \Controllers\ProductContr;
if (isset($_POST['submit'])) {

$pType = $_POST['pType'];
$pName = $_POST['pName'];
$pPrice = $_POST['pPrice'];
$pDiscount = $_POST['pDiscount'];
$pStock = $_POST['pStock'];
$pBoxsale = $_POST['pBoxsale'];
$pDescription = $_POST['pDescription'];
$pImgUrl = $_POST['pImgUrl'];
 
// instantiate Product Controller Class! :)
$addProduct = new ProductContr($pType, $pName, $pPrice, $pDiscount, $pStock, $pBoxsale, $pDescription, $pImgUrl);
// Running error handlers and create product! :)
$addProduct->createProduct();

// Go back to FP! :)
header("Location: ../adminProducts.php?status=pAdded");
}
