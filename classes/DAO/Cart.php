<?php

namespace DAO;

class Cart extends DbCon
{
    public $itemArray;
    public $newItemArray;
    public function existingCart($existingItems)
    {
        if (!empty($existingItems)) {
            $this->itemArray["cartItem"] = $existingItems;
        }
    }

    public function cartAdd($code, $quantity)
    {
        if (!empty($quantity)) {
            $sqlSelect = "SELECT * FROM products WHERE ProductID=$code";
            $stmt = $this->connect()->prepare($sqlSelect);
            if ($stmt->execute()) {

                $row = $stmt->fetch(\PDO::FETCH_ASSOC);

                $this->newItemArray = array($row["ProductID"] => array(
                    'name' => $row["pName"],
                    'code' => $row["ProductID"],
                    'quantity' => $quantity,
                    'price' => $row["pPrice"]
                ));
            } else {
                //echo $this->connect()->errorInfo();

                $stmt = null;
                header("Location: ../cart.php?error=stmtfailed");
                exit();
            }


            if (!empty($this->itemArray["cartItem"])) {
                if (in_array($row["ProductID"], array_keys($this->itemArray["cartItem"]))) {
                    foreach ($this->itemArray["cartItem"] as $k => $v) {
                        if ($row["ProductID"] == $k) {
                            if (empty($this->itemArray["cartItem"][$k]["quantity"])) {
                                $this->itemArray["cartItem"][$k]["quantity"] = 0;
                            }
                            $this->itemArray["cartItem"][$k]["quantity"] += $_POST["quantity"];
                        }
                    }
                } else {
                    $this->itemArray["cartItem"] = array_merge($this->itemArray["cartItem"], $this->newItemArray);
                }
            } else {
                $this->itemArray["cartItem"] = $this->newItemArray;
            }
        }
    }
    public function cartRemove($code)
    {
        //Remove item from cart
        if (!empty($this->itemArray["cartItem"])) {
            foreach ($this->itemArray["cartItem"] as $k => $v) {
                if ($code == $v['code'])
                    unset($this->itemArray["cartItem"][$k]);
                if (empty($this->itemArray["cartItem"]))
                    unset($this->itemArray["cartItem"]);
            }
        }
    }
    public function __destruct()
    {
        //$_SESSION["cart_item"] = $this->itemArray;
    }
}
