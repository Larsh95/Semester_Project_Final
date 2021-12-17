<?php

namespace Controllers;

class UserContr extends \DAO\Admin
{

    private $user;
    private $fname;
    private $lname;
    private $pass;
    private $email;
    private $rank;


    public function __construct($user, $fname, $lname, $pass, $email, $rank)
    {
        $this->user = trim(htmlspecialchars($user));
        $this->fname = trim(htmlspecialchars($fname));
        $this->lname = trim(htmlspecialchars($lname));
        $this->pass = trim(htmlspecialchars($pass));
        $this->email = trim(htmlspecialchars($email));
        $this->rank = trim(htmlspecialchars($rank));
    }

    public function addUser()
    {
        if ($this->emptyInput() == false) {
            header("Location: ./adminUsers.php?error=emptyinput");
            exit();
        }
        if ($this->userTakenCheck() == false) {
            header("Location: ../adminUsers.php?error=usertaken");
            exit();
        }
        if ($this->invalidUser() == false) {
            header("Location: ../adminUsers.php?error=invaliduser");
            exit();
        }
        if ($this->invalidEmail() == false) {
            header("Location: ../adminUsers.php?error=invalidemail");
            exit();
        }
        if ($this->pwdLength() == false) {
            header("Location: ../adminUsers.php?error=pwdtooshort");
            exit();
        }
        if ($this->invalidFirstName($this->fname) == false) {
            header("Location: ../adminUsers.php?error=invalidfname");
            exit();
        }
        if ($this->invalidLastName() == false) {
            header("Location: ../adminUsers.php?error=invalidlname");
            exit();
        }

        $this->setAdminUser($this->user, $this->fname, $this->lname, $this->pass, $this->email, $this->rank);
    }


    private function emptyInput()
    {
        if (empty($this->user) || empty($this->pass) || empty($this->fname) || empty($this->lname) || empty($this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function userTakenCheck()
    {
        if (!$this->checkUser($this->user, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function invalidUser()
    {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->user)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function invalidFirstName($fname)
    {
        if (!preg_match("/^[a-zA-Z]*$/", $fname)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function invalidLastName()
    {
        if (!preg_match("/^[a-zA-Z]*$/", $this->lname)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function invalidEmail()
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function pwdLength()
    {
        if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%._,?^*-]{3,69}$/', $this->pass)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
