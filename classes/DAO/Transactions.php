<?php

namespace DAO;

class Transactions extends DbCon
{

    public function updateTransaction($shipped, $id)
    {

        $sqlInsert = "UPDATE transactions SET shipped='$shipped' WHERE transacID='$id' ";
        $stmt = $this->connect()->prepare($sqlInsert);
        $stmt->bindParam($shipped, $shipped, \PDO::PARAM_STR);
        $stmt->bindParam($id, $id, \PDO::PARAM_INT);
        if (!$stmt->execute(array($shipped, $id))) {
            $stmt = null;
            header("Location: ../adminTransactions.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    public function getTransactions()
    {

        $sqlGet = "SELECT * FROM transactions";
        $stmt = $this->connect()->prepare($sqlGet);


        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ../adminTransactions.php?error=stmtfailed");
            exit();
        }

        $getTransactions = $stmt->fetchAll();
        foreach ($getTransactions as $getTransaction) {
            echo "<tr>";
            echo "<td>" . $getTransaction['orderID'] . "</td>";
            echo "<td>" . $getTransaction['shipped'] . "</td>";
            echo "<td>" . $getTransaction['timeStamp'] . "</td>";
            echo "<td>";
            echo "</td>";
            echo '<td><a href="./adminEditTransaction.php?id=' . $getTransaction['transacID'] . '" class="button" ">Edit</a></td>';
            echo "</tr>";
        }
    }
    public function getUserTransactions($userEmail)
    {

        $sqlGet = "SELECT * FROM `viewTransact` WHERE email='$userEmail'";
        $stmt = $this->connect()->prepare($sqlGet);


        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ../adminTransactions.php?error=stmtfailed");
            exit();
        }

        $getTransactions = $stmt->fetchAll();
        foreach ($getTransactions as $getTransaction) {
            echo "<tr>";
            echo "<td>" . $getTransaction['orderID'] . "</td>";
            echo "<td>" . $getTransaction['shipped'] . "</td>";
            echo "<td>" . $getTransaction['timeStamp'] . "</td>";
            echo "<td>";
            echo "</td>";
            echo '<td><a href="./viewTransactions.php?id=' . $getTransaction['transacID'] . '" class="button" ">View</a></td>';
            echo "</tr>";
        }
    }



    public function showTransact($entryid)
    {

        try {

            $sqlGet = "SELECT * FROM `viewTransact` WHERE transacID=$entryid";
            $stmt = $this->connect()->prepare($sqlGet);


            if (!$stmt->execute()) {
                $stmt = null;
                header("Location: ../adminTransactions.php?error=stmtfailed");
                exit();
            }

            $getProduct = $stmt->fetchAll();

            return $getProduct;
        } catch (\Throwable $th) {
            $th = header("Location: ../adminTransactions.php?error=stmtfailed");
        }
    }
}
