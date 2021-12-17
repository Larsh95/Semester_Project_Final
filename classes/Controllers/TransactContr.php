<?php

namespace Controllers;

class TransactContr extends \DAO\Transactions
{

    private $shipped;
    private $id;



    public function __construct($shipped, $id)
    {
        $this->shipped = trim(htmlspecialchars($shipped));
        $this->id = trim(htmlspecialchars($id));
    }

    public function transactionUpdate()
    {
        $this->updateTransaction($this->shipped, $this->id);
    }
}
