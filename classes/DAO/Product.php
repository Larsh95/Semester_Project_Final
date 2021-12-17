<?php

namespace DAO;

class Product extends DbCon
{
    protected function setProduct($pType, $pName, $pPrice, $pDiscount, $pStock, $pBoxsale, $pDescription, $pImgUrl)
    {
        $sqlInsert = "INSERT INTO products (`pType`,`pName`, `pPrice`, `pDiscount`, `pStock`, `pBoxsale`, `pDescription`, `pImgUrl`) VALUES ( ? , ? , ? , ? , ? , ? , ? , ? )";
        $stmt = $this->connect()->prepare($sqlInsert);
        $stmt->bindParam(1, $pType, \PDO::PARAM_STR);
        $stmt->bindParam(2, $pName, \PDO::PARAM_STR);
        $stmt->bindParam(3, $pPrice, \PDO::PARAM_INT);
        $stmt->bindParam(4, $pDiscount, \PDO::PARAM_INT);
        $stmt->bindParam(5, $pStock, \PDO::PARAM_INT);
        $stmt->bindParam(6, $pBoxsale, \PDO::PARAM_STR);
        $stmt->bindParam(7, $pDescription, \PDO::PARAM_STR);
        $stmt->bindParam(8, $pImgUrl, \PDO::PARAM_STR);
        if (!$stmt->execute(array($pType, $pName, $pPrice, $pDiscount, $pStock, $pBoxsale, $pDescription, $pImgUrl))) {
            $stmt = null;
            header("Location: ../adminProducts.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    public function updateProd($pType, $pName, $pPrice, $pDiscount, $pStock, $pBoxsale, $pDescription, $pImgUrl, $id)
    {

        $sqlInsert = "UPDATE products SET `pType`='$pType', `pName`='$pName', `pPrice`='$pPrice', `pDiscount`='$pDiscount', `pStock`='$pStock', `pBoxsale`='$pBoxsale', `pDescription`='$pDescription', `pImgUrl`='$pImgUrl' WHERE `ProductID`='$id' ";
        $stmt = $this->connect()->prepare($sqlInsert);
        $stmt->bindParam($pType, $pType, \PDO::PARAM_STR);
        $stmt->bindParam($pName, $pName, \PDO::PARAM_STR);
        $stmt->bindParam($pPrice, $pPrice, \PDO::PARAM_INT);
        $stmt->bindParam($pDiscount, $pDiscount, \PDO::PARAM_INT);
        $stmt->bindParam($pStock, $pStock, \PDO::PARAM_INT);
        $stmt->bindParam($pBoxsale, $pBoxsale, \PDO::PARAM_STR);
        $stmt->bindParam($pDescription, $pDescription, \PDO::PARAM_STR);
        $stmt->bindParam($pImgUrl, $pImgUrl, \PDO::PARAM_STR);
        if (!$stmt->execute(array($pType, $pName, $pPrice, $pDiscount, $pStock, $pBoxsale, $pDescription, $pImgUrl))) {
            $stmt = null;
            header("Location: ../adminProducts.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    public function delProduct()
    {
        $entryID = $_GET['ProductID'];
        $sqlDelete = "DELETE FROM products WHERE ProductID=$entryID";
        $stmt = $this->connect()->prepare($sqlDelete);

        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ../adminProducts.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }

        return $resultCheck;
    }

    public function getProducts()
    {
        $sortBy = (isset($_POST['sortBy']) ? $_POST['sortBy'] : NULL);
        $sqlGet = "SELECT * FROM products";
        if ($sortBy != NULL) {
            $sqlGet .= ' ORDER BY ' . $sortBy;
        }
        $stmt = $this->connect()->prepare($sqlGet);


        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ../adminProducts.php?error=stmtfailed");
            exit();
        }

        $getProducts = $stmt->fetchAll();
        foreach ($getProducts as $getProduct) {
            if ($getProduct['pDiscount'] > 0) {
                echo '<div class="utility__content">';
                echo '<img
                    src="' . $getProduct['pImgUrl'] . '"
                    alt=""
                    class="utility__img"
                />';
                echo '<h3 class="utility__title">' . $getProduct['pName'] . '</h3>';
                echo '<span class="utility__subtitle">' . $getProduct['pType'] . '</span>';
                echo '<span class="utility__subtitle">Stock: ' . $getProduct['pStock'] . '</span>';
                $disc = $getProduct['pPrice'] - ($getProduct['pPrice'] * ($getProduct['pDiscount'] / 100));
                echo '<span class="new__price"> ' . $disc . ' dkk </span>';
                echo '<span style="padding-bottom: 1rem;" class="new__discount">' . $getProduct['pPrice'] . ' dkk</span>';
                echo '<div class="utility__content" style="background: none;">';
                echo '<a href="./adminEditProduct.php?ProductID=' . $getProduct['ProductID'] . '"><button class="bx bx-edit utility__icon" style="font-size: 1.75rem !important; background: #E25D34; padding: 0.2rem 0.5rem; border-radius: 10px;">';
                echo '</button></a>';
                echo ' ';
                echo '<a href="./includes/DeleteProduct.inc.php?ProductID=' . $getProduct['ProductID'] . '"><button class="bx bx-x-circle utility__icon" style="font-size: 1.75rem !important; background: #E25D34; padding: 0.2rem 0.5rem; border-radius: 10px;" onclick="return confirm(\'Delete! are you sure?\')">';
                echo '</button></a></div>';
                echo '</div>';
            } else {
                echo '<div class="utility__content">';
                echo '<img
                    src="' . $getProduct['pImgUrl'] . '"
                    alt=""
                    class="utility__img"
                />';
                echo '<h3 class="utility__title">' . $getProduct['pName'] . '</h3>';
                echo '<span class="utility__subtitle">' . $getProduct['pType'] . '</span>';
                echo '<span class="utility__subtitle">Stock: ' . $getProduct['pStock'] . '</span>';
                echo '<span style="padding-bottom: 1rem;" class="utility__price">' . $getProduct['pPrice'] . ' dkk</span>';
                echo '<a href="./adminEditProduct.php?ProductID=' . $getProduct['ProductID'] . '"><button class="bx bx-edit utility__icon" style="font-size: 1.75rem !important; background: #E25D34; padding: 0.2rem 0.5rem; border-radius: 10px;">';
                echo '</button></a>';
                echo ' ';
                echo '<a href="./includes/DeleteProduct.inc.php?ProductID=' . $getProduct['ProductID'] . '"><button class="bx bx-x-circle utility__icon" style="font-size: 1.75rem !important; background: #E25D34; padding: 0.2rem 0.5rem; border-radius: 10px;" onclick="return confirm(\'Delete! are you sure?\')">';
                echo '</button></a>';
                echo '</div>';
            }
        }
    }



    public function showProduct($entryid)
    {
        //$entryID = $_GET['id'];


        try {

            $sqlGet = "SELECT * FROM products WHERE ProductID=$entryid";
            $stmt = $this->connect()->prepare($sqlGet);


            if (!$stmt->execute()) {
                $stmt = null;
                header("Location: ../adminEditProduct.php?error=stmtfailed");
                exit();
            }

            $getProduct = $stmt->fetchAll();

            return $getProduct;
        } catch (\Throwable $th) {
            $th = header("Location: ../adminEditProduct.php?error=stmtfailed");
        }
    }
}
