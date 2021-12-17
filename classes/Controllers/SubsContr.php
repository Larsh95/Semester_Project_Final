<?php

namespace Controllers;

class SubsContr extends \DAO\Subs
{

    private $email;


    public function __construct($email)
    {
        $this->email = trim(htmlspecialchars($email));
    }

    public function addSub()
    {
        if ($this->emptyInput() == false) {
            header("Location: ../index.php?error=emptyinput");
            exit();
        }
        if ($this->invalidEmail() == false) {
            header("Location: ../index.php?error=invalidemail");
            exit();
        }

        $this->setSubs($this->email);
    }

    private function emptyInput()
    {
        if (empty($this->email)) {
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
