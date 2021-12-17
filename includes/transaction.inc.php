<?php
include '../vendor/autoload.php';

use \Controllers\TransactContr;

if (isset($_POST['submit'])) { // Form has been submitted.

    // Grab the data! :)

    $id = $_POST['transacID'];
    $shipped = $_POST['shipped'];

    var_dump($shipped);
    // instantiate User Controller Class! :)
    $updateTransaction = new TransactContr($shipped, $id);
    // Running error handlers and create User! :)
    $updateTransaction->transactionUpdate();
    // Go back to FP! :)
    header("Location: ../adminTransactions.php?status=tAdded");
}
