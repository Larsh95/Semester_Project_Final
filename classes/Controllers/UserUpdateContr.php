<?php

namespace Controllers;

class UserUpdateContr extends \DAO\Admin
{

    //$adminDAO = new Admin();    

    private $user;
    private $fname;
    private $lname;
    private $email;
    private $id;

    public function __construct($user, $fname, $lname, $email, $id)
    {
        $this->user = trim(htmlspecialchars($user));
        $this->fname = trim(htmlspecialchars($fname));
        $this->lname = trim(htmlspecialchars($lname));
        $this->email = trim(htmlspecialchars($email));
        $this->id = trim(htmlspecialchars($id));
    }

    public function updateUser()
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
        if ($this->invalidFirstName() == false) {
            header("Location: ../adminUsers.php?error=invalidfname");
            exit();
        }
        if ($this->invalidLastName() == false) {
            header("Location: ../adminUsers.php?error=invalidlname");
            exit();
        }
        //$this->adminModel->adminUpdateUser();
        $this->adminUpdateUser($this->user, $this->fname, $this->lname, $this->email, $this->id);
    }
    private function emptyInput()
    {
        if (empty($this->user) || empty($this->fname) || empty($this->lname) || empty($this->email)) {
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
    private function invalidFirstName()
    {
        if (!preg_match("/^[a-zA-Z]*$/", $this->fname)) {
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
}
