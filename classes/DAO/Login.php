<?php

namespace DAO;

class Login extends DbCon
{
    protected function getUser($user, $pass)
    {
        $sqlSelect = "SELECT pass FROM Users WHERE user = ? OR email = ?";
        $stmt = $this->connect()->prepare($sqlSelect);

        if (!$stmt->execute(array($user, $pass))) {
            $stmt = null;
            header("Location: ../login.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("Location: ../login.php?error=usernotfound");
            exit();
        }

        $hashed_password = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $checkpwd = password_verify($pass, $hashed_password[0]['pass']);

        if ($checkpwd == false) {
            $stmt = null;
            header("Location: ../login.php?error=wrongpass");
            exit();
        } elseif ($checkpwd == true) {
            $sqlSelect = "SELECT * FROM Users WHERE user = ? OR email = ? AND pass = ?";
            $stmt = $this->connect()->prepare($sqlSelect);

            if (!$stmt->execute(array($user, $user, $pass))) {
                $stmt = null;
                header("Location: ../login.php?error=stmtfailed");
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("Location: ../login.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            session_start();
            $_SESSION['id'] = $user[0]['id'];
            $_SESSION['user'] = $user[0]['user'];
            $_SESSION['userFname'] = $user[0]['fName'];
            $_SESSION['userLname'] = $user[0]['lName'];
            $_SESSION['userEmail'] = $user[0]['email'];
            $_SESSION['rank'] = $user[0]['rank'];

            $stmt = null;
        }
    }
}
