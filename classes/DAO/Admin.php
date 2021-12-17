<?php

namespace DAO;

class Admin extends DbCon
{
    protected function setAdminUser($user, $fname, $lname, $pass, $email, $rank)
    {
        $sqlInsert = "INSERT INTO `Users` (rank, fName, lName, user, pass, email) VALUES ( ? , ? , ? , ? , ? , ? )";
        $stmt = $this->connect()->prepare($sqlInsert);
        $iterations = ['cost' => 10];
        $hashed_password = password_hash($pass, PASSWORD_BCRYPT, $iterations);
        $stmt->bindParam(1, $rank, \PDO::PARAM_INT);
        $stmt->bindParam(2, $fname, \PDO::PARAM_STR);
        $stmt->bindParam(3, $lname, \PDO::PARAM_STR);
        $stmt->bindParam(4, $user, \PDO::PARAM_STR);
        $stmt->bindParam(5, $hashed_password, \PDO::PARAM_STR);
        $stmt->bindParam(6, $email, \PDO::PARAM_STR);

        if (!$stmt->execute(array($rank, $fname, $lname, $user, $hashed_password, $email))) {
            $stmt = null;
            header("Location: ../adminUsers.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    public function adminUpdateUser($user, $fname, $lname, $email, $id)
    {

        $sqlInsert = "UPDATE Users SET `user`='$user', `fName`='$fname', `lName`='$lname', `email`='$email' WHERE `id`='$id' ";
        $stmt = $this->connect()->prepare($sqlInsert);
        $stmt->bindParam($user, $user, \PDO::PARAM_STR);
        $stmt->bindParam($fname, $fname, \PDO::PARAM_STR);
        $stmt->bindParam($lname, $lname, \PDO::PARAM_STR);
        $stmt->bindParam($email, $email, \PDO::PARAM_STR);
        $stmt->bindParam($id, $id, \PDO::PARAM_INT);
        if (!$stmt->execute(array($user, $fname, $lname, $email))) {
            var_dump($stmt);
            $stmt = null;
            header("Location: ../adminUsers.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    public function delUser()
    {
        $entryID = $_GET['id'];
        $sqlDelete = "DELETE FROM Users WHERE id=$entryID";
        $stmt = $this->connect()->prepare($sqlDelete);

        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ../adminUsers.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }

        return $resultCheck;
    }



    protected function checkUser($user, $email)
    {
        $sqlSelect = "SELECT user FROM Users WHERE user = ? OR email = ?";
        $stmt = $this->connect()->prepare($sqlSelect);

        if (!$stmt->execute(array($user, $email))) {
            $stmt = null;
            header("Location: ../adminUsers.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }

        return $resultCheck;
    }

    public function getUsers()
    {
        $sqlGet = "SELECT * FROM Users";
        $stmt = $this->connect()->prepare($sqlGet);


        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ../adminUsers.php?error=stmtfailed");
            exit();
        }

        $getUsers = $stmt->fetchAll();
        foreach ($getUsers as $getUser) {
            echo "<tr>";
            echo "<td>" . $getUser['user'] . "</td>";
            echo "<td>" . $getUser['fName'] . " " . $getUser['lName'] . "</td>";
            echo "<td>" . $getUser['email'] . "</td>";
            echo "<td>";
            echo "</td>";
            echo '<td><a href="./adminEditUsers.php?id=' . $getUser['id'] . '" class="button" ">Edit</a></td>';
            echo '<td><a href="./includes/DeleteUser.inc.php?id=' . $getUser['id'] . '" class="button" onclick="return confirm(\'Delete! are you sure?\')">Delete</a></td>';
            echo "</tr>";
        }
    }



    public function showUser($entryID)
    {
        //$entryID = $_GET['id'];


        try {

            $sqlGet = "SELECT * FROM Users WHERE id=$entryID";
            $stmt = $this->connect()->prepare($sqlGet);
            $stmt->bindParam($entryID, $entryID, \PDO::PARAM_INT);

            if (!$stmt->execute()) {
                $stmt = null;
                header("Location: ../adminUsers.php?error=stmtfailed");
                exit();
            }

            $getUser = $stmt->fetchAll();

            return $getUser;
        } catch (\Throwable $th) {
            $th = header("Location: ../adminUsers.php?error=stmtfailed");
        }
    }


    public function adminAbout($title, $subtitle, $company1, $company2, $cInfo1, $cInfo2, $openHour)
    {

        $sqlInsert = "UPDATE about SET `title`='$title', `subtitle`='$subtitle', `company1`='$company1', `company2`='$company2', `cInfo1`='$cInfo1', `cInfo2`='$cInfo2', `openHour`='$openHour' WHERE `aboutID`='1' ";
        $stmt = $this->connect()->prepare($sqlInsert);
        $stmt->bindParam($title, $title, \PDO::PARAM_STR);
        $stmt->bindParam($subtitle, $subtitle, \PDO::PARAM_STR);
        $stmt->bindParam($company1, $company1, \PDO::PARAM_STR);
        $stmt->bindParam($company2, $company2, \PDO::PARAM_STR);
        $stmt->bindParam($cInfo1, $cInfo1, \PDO::PARAM_STR);
        $stmt->bindParam($cInfo2, $cInfo2, \PDO::PARAM_STR);
        $stmt->bindParam($openHour, $openHour, \PDO::PARAM_STR);
        if (!$stmt->execute(array($title, $subtitle, $company1, $company2, $cInfo1, $cInfo2, $openHour))) {
            $stmt = null;
            header("Location: ../adminEditAbout.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }
    public function getAbout()
    {
        try {

            $sqlGet = "SELECT * FROM about";
            $stmt = $this->connect()->prepare($sqlGet);
            if (!$stmt->execute()) {
                $stmt = null;
                header("Location: ../adminEditAbout.php?error=stmtfailed");
                exit();
            }

            $getAbout = $stmt->fetchAll();

            return $getAbout;
        } catch (\Throwable $th) {
            $th = header("Location: ../adminEditAbout.php?error=stmtfailed");
        }
    }
}
