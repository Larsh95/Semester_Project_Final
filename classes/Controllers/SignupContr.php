<?php

namespace Controllers;

class SignupContr extends \DAO\Signup
{

    private $user;
    private $pass;
    private $fname;
    private $lname;
    private $email;
    private $confpass;

    public function __construct($user, $pass, $confpass, $fname, $lname, $email)
    {
        $this->user = trim(htmlspecialchars($user));
        $this->pass = trim(htmlspecialchars($pass));
        $this->confpass = trim(htmlspecialchars($confpass));
        $this->fname = trim(htmlspecialchars($fname));
        $this->lname = trim(htmlspecialchars($lname));
        $this->email = trim(htmlspecialchars($email));
    }

    public function signupUser()
    {
        if ($this->emptyInput() == false) {
            header("Location: ../signup.php?error=emptyinput");
            exit();
        }
        if ($this->invalidUser() == false) {
            header("Location: ../signup.php?error=invaliduser");
            exit();
        }
        if ($this->invalidEmail() == false) {
            header("Location: ../signup.php?error=invalidemail");
            exit();
        }
        if ($this->userTakenCheck() == false) {
            header("Location: ../signup.php?error=usertaken");
            exit();
        }
        if ($this->pwdLength() == false) {
            header("Location: ../signup.php?error=pwdtooshort");
            exit();
        }
        if ($this->pwdRepeat() == false) {
            header("Location: ../signup.php?error=pwdnotsame");
            exit();
        }
        if ($this->invalidFirstName() == false) {
            header("Location: ../signup.php?error=invalidfname");
            exit();
        }
        if ($this->invalidLastName() == false) {
            header("Location: ../signup.php?error=invalidlname");
            exit();
        }

        $this->setUser($this->user, $this->pass, $this->email, $this->fname, $this->lname);
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
    // $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
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
    private function pwdRepeat()
    {
        if ($this->pass != $this->confpass) {
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
}
