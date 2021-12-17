<?php

namespace Controllers;

class CheckoutContr extends \DAO\Checkout
{

    private $fname;
    private $lname;
    private $email;
    private $postCode;
    private $city;
    private $address;
    private $phoneNum;
    private $userID;
    private $totalPrice;
    private $pItems;
    private $status;

    public function __construct($fname, $lname, $email, $postCode, $city, $address, $phoneNum, $userID, $totalPrice, $pItems, $status)
    {
        $this->fname = trim(htmlspecialchars($fname));
        $this->lname = trim(htmlspecialchars($lname));
        $this->email = trim(htmlspecialchars($email));
        $this->postCode = trim(htmlspecialchars($postCode));
        $this->city = trim(htmlspecialchars($city));
        $this->address = trim(htmlspecialchars($address));
        $this->phoneNum = trim(htmlspecialchars($phoneNum));
        $this->userID = trim(htmlspecialchars($userID));
        $this->totalPrice = trim(htmlspecialchars($totalPrice));
        $this->pItems = $pItems;
        $this->status = trim(htmlspecialchars($status));
    }

    public function orderCheckout()
    {
        if ($this->emptyInput() == false) {
            header("Location: ../signup.php?error=emptyinput");
            exit();
        }
        if ($this->invalidNumber() == false) {
            header("Location: ../signup.php?error=invaliduser");
            exit();
        }
        if ($this->invalidEmail() == false) {
            header("Location: ../signup.php?error=invalidemail");
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

        $this->setOrder($this->fname, $this->lname, $this->email, $this->postCode, $this->city, $this->address, $this->phoneNum, $this->userID, $this->totalPrice, $this->pItems, $this->status);
    }

    private function emptyInput()
    {
        if (empty($this->fname) || empty($this->lname) || empty($this->email) || empty($this->postCode) || empty($this->city) || empty($this->address) || empty($this->phoneNum) || empty($this->totalPrice) || empty($this->pItems)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function invalidNumber()
    {
        if (!preg_match("/[0-9 +-]{8,16}/", $this->phoneNum)) {
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
