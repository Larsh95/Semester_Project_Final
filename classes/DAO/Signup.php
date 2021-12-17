<?php

namespace DAO;

class Signup extends DbCon
{
    protected function setUser($user, $pass, $email, $fname, $lname)
    {
        $sqlInsert = "INSERT INTO `Users` (rank, fName, lName, user, pass, email) VALUES ('1', ? , ? , ? , ? , ? )";
        $stmt = $this->connect()->prepare($sqlInsert);
        $iterations = ['cost' => 10];
        $hashed_password = password_hash($pass, PASSWORD_BCRYPT, $iterations);
        $stmt->bindParam(2, $user, \PDO::PARAM_STR);
        $stmt->bindParam(3, $pass, \PDO::PARAM_STR);
        $stmt->bindParam(4, $email, \PDO::PARAM_STR);
        $stmt->bindParam(5, $fname, \PDO::PARAM_STR);
        $stmt->bindParam(6, $lname, \PDO::PARAM_STR);

        if (!$stmt->execute(array($fname, $lname, $user, $hashed_password, $email))) {
            $stmt = null;
            header("Location: ../signup.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }


    protected function checkUser($user, $email)
    {
        $sqlSelect = "SELECT user FROM Users WHERE user = ? OR email = ?";
        $stmt = $this->connect()->prepare($sqlSelect);

        if (!$stmt->execute(array($user, $email))) {
            $stmt = null;
            header("Location: ../signup.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }

        return $resultCheck;
    }
}
