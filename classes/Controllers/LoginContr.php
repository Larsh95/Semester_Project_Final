<?php

namespace Controllers;

use DAO\Login;

class LoginContr extends Login
{

    private $user;
    private $pass;

    public function __construct($user, $pass)
    {
        $this->user = trim(htmlspecialchars($user));
        $this->pass = trim(htmlspecialchars($pass));
    }

    public function loginUser()
    {
        if ($this->emptyInput() == false) {
            header("Location: ../login.php?error=emptyinput");
            exit();
        }
        $this->getUser($this->user, $this->pass);
    }

    private function emptyInput()
    {
        if (empty($this->user) || empty($this->pass)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
