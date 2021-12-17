<?php

namespace DAO;

class Checkout extends DbCon
{
    public function setOrder($fname, $lname, $email, $postCode, $city, $address, $phoneNum, $userID, $totalPrice, $pItems, $status)
    {
        $sqlInsert = "INSERT INTO orders (fname, lname, email, postCode, city, address, phoneNum, userID, totalPrice, pItems, status ) VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? )";
        $stmt = $this->connect()->prepare($sqlInsert);
        $stmt->bindParam(1, $fname, \PDO::PARAM_STR);
        $stmt->bindParam(2, $lname, \PDO::PARAM_STR);
        $stmt->bindParam(3, $email, \PDO::PARAM_STR);
        $stmt->bindParam(4, $postCode, \PDO::PARAM_STR);
        $stmt->bindParam(5, $city, \PDO::PARAM_STR);
        $stmt->bindParam(6, $address, \PDO::PARAM_STR);
        $stmt->bindParam(7, $phoneNum, \PDO::PARAM_STR);
        $stmt->bindParam(8, $userID, \PDO::PARAM_STR);
        $stmt->bindParam(9, $totalPrice, \PDO::PARAM_STR);
        $stmt->bindParam(10, $pItems, \PDO::PARAM_STR);
        $stmt->bindParam(11, $status, \PDO::PARAM_STR);
        if (!$stmt->execute(array($fname, $lname, $email, $postCode, $city, $address, $phoneNum, $userID, $totalPrice, $pItems, $status))) {
            $stmt = null;
            header("Location: ../checkout.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    public function showOrder($entryid)
    {
        $sqlGet = "SELECT * FROM orders WHERE email = '$entryid' ORDER BY orderID DESC LIMIT 1";
        $stmt = $this->connect()->prepare($sqlGet);

        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ./sample-charge.php?error=stmtfailed");
            exit();
        }

        $getOrder = $stmt->fetchAll();

        return $getOrder;
    }



    public function updateOrder($id)
    {
        $sqlUpdate = "UPDATE orders SET status='success' WHERE orderID='$id' ";
        $stmt = $this->connect()->prepare($sqlUpdate);

        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ../sample-charge.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }
}
