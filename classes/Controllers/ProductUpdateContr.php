<?php

namespace Controllers;

use \DAO\Product;

class ProductUpdateContr extends Product
{

    private $pType;
    private $pName;
    private $pPrice;
    private $pDiscount;
    private $pStock;
    private $pBoxsale;
    private $pDescription;
    private $pImgUrl;
    private $id;

    public function __construct($pType, $pName, $pPrice, $pDiscount, $pStock, $pBoxsale, $pDescription, $pImgUrl, $id)
    {
        $this->pType = trim(htmlspecialchars($pType));
        $this->pName = trim(htmlspecialchars($pName));
        $this->pPrice = trim(htmlspecialchars($pPrice));
        $this->pDiscount = trim(htmlspecialchars($pDiscount));
        $this->pStock = trim(htmlspecialchars($pStock));
        $this->pBoxsale = trim(htmlspecialchars($pBoxsale));
        $this->pDescription = trim(htmlspecialchars($pDescription));
        $this->pImgUrl = trim(htmlspecialchars($pImgUrl));
        $this->id = trim(htmlspecialchars($id));
    }
    public function updateProduct()
    {
        if ($this->emptyInput() == false) {
            header("Location: ./adminProducts.php?error=emptyinput");
            exit();
        }
        // if($this->invalidBoxsale() == false) {
        //     header("Location: ../adminUsers.php?error=usertaken");
        //     exit();
        // }
        if ($this->invalidPrice() == false) {
            header("Location: ../adminProducts.php?error=invalidpPrice");
            exit();
        }
        if ($this->invalidName() == false) {
            header("Location: ../adminProducts.php?error=invalidpName");
            exit();
        }
        if ($this->invalidDiscount() == false) {
            header("Location: ../adminProducts.php?error=invalidpDiscount");
            exit();
        }
        $this->updateProd($this->pType, $this->pName, $this->pPrice, $this->pDiscount, $this->pStock, $this->pBoxsale, $this->pDescription, $this->pImgUrl, $this->id);
    }
    private function emptyInput()
    {
        if (empty($this->pName) || empty($this->pPrice) || empty($this->pStock) || empty($this->pDescription || empty($this->pImgUrl))) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function invalidPrice()
    {
        if (!preg_match("/^[0-9]*.$/", $this->pPrice)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function invalidName()
    {
        if (!preg_match("/^[a-zA-Z0-9_ -]*$/", $this->pName)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function invalidDiscount()
    {
        if (!preg_match("/^[0-9]*$/", $this->pDiscount)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
