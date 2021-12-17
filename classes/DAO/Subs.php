<?php

namespace DAO;

class Subs extends DbCon
{
    protected function setSubs($email)
    {
        $sqlInsert = "INSERT INTO newsletter (`email`) VALUES ( ? )";
        $stmt = $this->connect()->prepare($sqlInsert);
        $stmt->bindParam(1, $email, \PDO::PARAM_STR);

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    public function getSubs()
    {
        $sqlGet = "SELECT * FROM newsletter";
        $stmt = $this->connect()->prepare($sqlGet);


        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }

        $getSubs = $stmt->fetchAll();
        foreach ($getSubs as $getSub) {

            echo $getSub['email'] . ' ,</br>';
        }
    }
}
