<?php
include '../vendor/autoload.php';

use Controllers\ProductUpdateContr;

if (isset($_POST['entryid']) && isset($_POST['submit'])) {
    $pType = $_POST['pType'];
    $pName = $_POST['pName'];
    $pPrice = $_POST['pPrice'];
    $pDiscount = $_POST['pDiscount'];
    $pStock = $_POST['pStock'];
    $pBoxsale = $_POST['pBoxsale'];
    $pDescription = $_POST['pDescription'];
    $pImgUrl = $_POST['pImgUrl'];
    $id = $_POST['entryid'];

    $eProd = new ProductUpdateContr($pType, $pName, $pPrice, $pDiscount, $pStock, $pBoxsale, $pDescription, $pImgUrl, $id);
    $eProd->updateProduct();

    header("Location: ../adminProducts.php?status=pUpdated&id=$id");
}
